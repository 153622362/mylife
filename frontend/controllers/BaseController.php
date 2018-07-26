<?php
namespace frontend\controllers;


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
class BaseController extends Controller
{
	public $user_avatar = '/static/img/logo2.jpg';
 	public function beforeAction($action)
	{
		if (!empty(Yii::$app->user->id))
		{
			$this->user_avatar = Yii::$app->user->identity->avatar;
		}
		return parent::beforeAction($action);
	}
}
