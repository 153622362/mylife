<?php
namespace frontend\controllers;


use frontend\models\Chat;
use Yii;


class ChatController extends BaseController
{
   public function actionIndex()
   {
   		$chat_id = Yii::$app->request->get('pid');
   		$arr = Chat::getChatByPid($chat_id);
	   	if (!empty($arr)){
	   		$arr = json_encode($arr);
			return $arr;

		}
   }
}
