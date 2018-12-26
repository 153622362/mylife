<?php
namespace common\behaviors;

/**
 * Created by PhpStorm.
 * User: ngyhd
 * Date: 2018/12/26
 * Time: 19:38
 */

use yii\base\Component;
use yii\db\ActiveRecord;

class Events extends Component
{
	const EVENT_HELLO = 'hello';
	// 其它代码

	public function events()
	{
		return [
			ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
		];
	}



	/**
	 * 使用示例
	 */
	public function usage()
	{
		$foo = new self();

		// 处理器是全局函数
		$foo->on(self::EVENT_HELLO, 'function_name');

		// 处理器是对象方法
		$foo->on(self::EVENT_HELLO, [new self(), 'methodName']);

		// 处理器是静态类方法
		$foo->on(self::EVENT_HELLO, ['app\components\Bar', 'methodName']);

		// 处理器是匿名函数
		$foo->on(self::EVENT_HELLO, function ($event) {
			//事件处理逻辑
		});

	}




}

