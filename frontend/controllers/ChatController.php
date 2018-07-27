<?php
namespace frontend\controllers;


use frontend\models\Chat;
use frontend\models\form\ChatForm;
use frontend\models\form\PostForm;
use frontend\models\form\SiteForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
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
