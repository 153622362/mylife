<?php
namespace frontend\controllers;


use common\models\User;
use frontend\models\Chat;
use frontend\models\form\ChatForm;
use Yii;
use yii\filters\AccessControl;


class LanguageController extends BaseController
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['replycht'],
				'rules' => [
					[
						'actions' => ['replychat'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}

	/**
	 * 多语言切换
	 */
   public function actionLanguage()
   {
	   $language=  \Yii::$app->request->get('lang');
	   if(isset($language)){
		   \Yii::$app->session['language']=$language;
	   }
	   //切换完语言哪来的返回到哪里
	   $this->goBack(\Yii::$app->request->headers['Referer']);
   }
}
