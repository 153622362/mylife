<?php
namespace frontend\controllers;



use frontend\models\form\SearchForm;
use frontend\models\Letter;
use frontend\models\Notice;
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
			Yii::$app->params['l_count'] = Letter::find()->where(['receiver'=>Yii::$app->user->id,'read_status'=>0])->count();
			Yii::$app->params['n_count'] = Notice::find()->where(['receiver'=>Yii::$app->user->id,'read_status'=>0])->count();
			$this->user_avatar = Yii::$app->user->identity->avatar;
		}
		return parent::beforeAction($action);
	}
}
