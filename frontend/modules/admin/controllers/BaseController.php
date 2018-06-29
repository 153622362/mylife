<?php
namespace frontend\modules\admin\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * 父控制器
 */
class BaseController extends Controller
{
    public $layout = false;


	/*
  *该方法给在用户操作之前进行验证是否登录
  *
  *删除操作必须为POST方法
 */
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@']
					],
					//下面为不登录就可以访问测试专用暂时开放这个几个方法
					[
// 										'actions' => ['update','view','create','demo','list','test','ad','index','login'],
						'actions' => ['login'],
						'allow' => ['*'],
					],
				]
			],
		];
	}


}
