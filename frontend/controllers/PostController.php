<?php
namespace frontend\controllers;


use frontend\models\form\ChatForm;
use frontend\models\form\PostForm;
use frontend\models\form\SiteForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;


class PostController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
	{
		$post_id = Yii::$app->request->get('id',0);
		$data['article_info'] = PostForm::PostInfoById($post_id); //文章信息
		$data['clike'] = PostForm::PostLikeByID($post_id); //点赞数
		$data['cfav'] = PostForm::PostFavByID($post_id); //收藏数
		$data['ccom'] = PostForm::PostComByID($post_id); //评论数
		$data['likeinfo'] = PostForm::PostLikeInfoById($post_id); //点赞信息
		$data['cominfo'] = PostForm::PostComInfoById($post_id); //评论信息
		$data['hotdy'] = PostForm::hotestDynamic(); //热门动态
		$data['userinfo'] = PostForm::UserInfo($data['article_info']); //作者信息
		$data['cfan'] = PostForm::FanCount($data['article_info']['author']);
//		var_dump($data);exit;
		return $this->render('index',[
			'data'=>$data
		]);
	}


}
