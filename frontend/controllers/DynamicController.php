<?php
namespace frontend\controllers;





class DynamicController extends BaseController
{
   public function actionIndex()
   {
   		return $this->render('index');
   }
}
