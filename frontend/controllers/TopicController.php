<?php
namespace frontend\controllers;


class TopicController extends BaseController
{
   public function actionIndex()
   {
   		return $this->render('index');
   }
}
