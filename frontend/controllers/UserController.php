<?php
namespace frontend\controllers;


class UserController extends BaseController
{
	/**
	 * 个人中心
	 * @return string
	 */
   public function actionCenter()
   {
   		return $this->render('center');
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
