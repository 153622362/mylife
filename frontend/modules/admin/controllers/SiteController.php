<?php
namespace frontend\modules\admin\controllers;


use Yii;
use yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    public $layout = false;


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


	public function actionIndex()
	{
		return $this->render('index');
	}
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public  function actionLogin()
    {

        if (!\Yii::$app->user->isGuest)
        {
            return \Yii::$app->getResponse()->redirect(Url::to('/admin/admin/admin'));
        }

        $model = new LoginForm();

        if ( $model->load( Yii::$app->request->post() )  && $model->login() )
        {
            return \Yii::$app->getResponse()->redirect(Url::to('/admin/admin/admin'));
        }
        else
        {
            $this->layout=false;  //登录的时候渲染模板

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return Yii::$app->getResponse()->redirect(Url::to('/admin/site/login'));
    }


}
