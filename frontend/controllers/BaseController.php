<?php
namespace frontend\controllers;



use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class BaseController extends Controller
{
	public $user_avatar = '/static/img/logo2.jpg';
 	public function beforeAction($action)
	{
		Yii::$app->name = 'My Life';
		if (!empty(Yii::$app->user->id))
		{
			$this->user_avatar = Yii::$app->user->identity->avatar;
		}
		return parent::beforeAction($action);
	}
}
