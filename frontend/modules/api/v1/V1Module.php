<?php
namespace frontend\modules\api\v1;

class V1Module extends \yii\base\Module
{
	public function init()
	{
		parent::init();
//		\Yii::$app->user->enableSession = false; //授权验证配置一
		$this->params['foo'] = 'bar';
		// ...  其他初始化代码 ...
	}
}