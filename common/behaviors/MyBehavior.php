<?php
namespace common\behaviors;

/**
 * Created by PhpStorm.
 * User: ngyhd
 * Date: 2018/12/26
 * Time: 19:38
 */

use yii\base\Behavior;

class MyBehavior extends Behavior
{
	// 其它代码

	public function events()
	{
		return [
			Events::EVENT_HELLO => 'beforeValidate',
		];
	}

	public function beforeValidate($event)
	{
		// 处理器方法逻辑
	}





}