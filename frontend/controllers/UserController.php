<?php
namespace frontend\controllers;


use common\models\User;
use frontend\models\form\UserForm;

class UserController extends BaseController
{
	/**
	 * 个人中心
	 * @return string
	 */
   public function actionCenter()
   {
	   $user_id = \Yii::$app->user->identity->id;
	   $user_info= UserForm::userInfo($user_id); //获取用户基本信息
	   $user_info['favorite']= UserForm::userFavorite($user_id); //获取用户关注
	   $user_info['fans']= UserForm::userFans($user_id); //获取用户粉丝
	   $user_info['visitors']= UserForm::userVisitors($user_id); //获取用户访客
	   $user_info['dy'] = UserForm::dynamic($user_id);
//	   var_dump($user_info);exit;
   		return $this->render('center',[
   			'user' => $user_info
		]);
   }


   public function actionIndex()
   {
   		return $this->render('index');
   }

	/**
	 * 设置中心
	 * @return string
	 */
   public function actionSetting()
   {
   		return $this->render('setting');
   }

   public function actionPost()
   {
   		return $this->render('post');
   }

   public function actionFavorite()
   {
   		return $this->render('favorite');
   }

   public function actionScore()
   {
   		return $this->render('score');
   }

   public function actionNotice()
   {
   		return $this->render('notice');
   }

   public function actionSign()
   {
   		return $this->render('sign');
   }

   public function actionMessage()
   {
   		return $this->render('message');
   }




}
