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
class DynamicController extends BaseController
{
   public function actionIndex()
   {
   		return $this->render('index');
   }
}
