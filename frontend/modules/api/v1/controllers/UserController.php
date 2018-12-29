<?php
namespace frontend\modules\api\v1\controllers;

use frontend\modules\api\v1\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\RateLimiter;
use yii\rest\ActiveController;
use yii\web\Response;

class UserController extends ActiveController
{
	public $modelClass = 'frontend\modules\api\v1\models\User';

	//过滤器
	//[[yii\filters\ContentNegotiator|contentNegotiator]]: 支持内容协商， 在 响应格式化 一节描述;
	//[[yii\filters\VerbFilter|verbFilter]]: 支持HTTP 方法验证;
	//[[yii\filters\auth\AuthMethod|authenticator]]: 支持用户认证， 在认证一节描述;
	//[[yii\filters\RateLimiter|rateLimiter]]: 支持频率限制， 在频率限制 一节描述.
	public function behaviors()
	{
		$behaviors = parent::behaviors();
		//认证过滤器
		$behaviors['authenticator'] = [ //可以同时支持这三种方法 https://www.yiichina.com/doc/guide/2.0/rest-authentication
				'class'=>QueryParamAuth::className(), //参数认证  http://mylife2.test/api/users/1?access-token=lkjh
//			    'class'=>HttpBasicAuth::className(), //用户名认证 http://mylife2.test/api/users/1  输入文本框lkjh
//			'class'=>HttpBearerAuth::className(), //OAUTH2.0认证 //客户端 header中传入 Authorization:Bearer xxxxxx，然后在你的 user identity class 类中实现 findIdentityByAccessToken() 方法
		];
		//限制请求速率的过滤器
		$behaviors['rateLimiter'] = [
			'class' => RateLimiter::className(),
			'enableRateLimitHeaders' => true,
		];
		$behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON; //设置响应格式
		return $behaviors;
	}
	public function init()
	{
		parent::init();
		\Yii::$app->user->enableSession = false;
		\Yii::$app->user->loginUrl = null;
	}



//	禁用动作配置
	public function actions()
	{
		$actions = parent::actions();

		// 禁用"delete" 和 "create" 动作
		unset($actions['delete'], $actions['create']);

		// 使用"prepareDataProvider()"方法自定义数据provider
//		$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

		return $actions;
	}

//	public function prepareDataProvider()
//	{
//		return ['1'=>2];// 为"index"动作准备和返回数据provider
//	}

	//执行访问检查
	//checkAccess() 方法默认会被[[yii\rest\ActiveController]]默认动作所调用，如果创建新的操作并想执行权限检查， 应在新的动作中明确调用该方法。
	public function checkAccess($action, $model = null, $params = [])
	{
		// check if the user can access $action and $model
		// throw ForbiddenHttpException if access should be denied
		if ($action === 'index') {
			if (empty($model->id)){
				throw new \yii\web\ForbiddenHttpException(sprintf('id不能为空.', $action));
			}
		}
		if (($action === 'update' || $action === 'delete')) {
			if ($model->id !== \Yii::$app->user->id)
				throw new \yii\web\ForbiddenHttpException(sprintf('You can only %s articles that you\'ve created.', $action));
		}
	}

	public function actionView($id)
	{
		return User::findOne($id);
	}

	//X-Pagination-Total-Count: 资源所有数量;
	//X-Pagination-Page-Count: 页数;
	//X-Pagination-Current-Page: 当前页(从1开始);
	//X-Pagination-Per-Page: 每页资源数量;
	//Link: 允许客户端一页一页遍历资源的导航链接集合.
	//集合
	public function actionIndex()
	{
		return new ActiveDataProvider([
			'query' => User::find(),
		]);
	}

}