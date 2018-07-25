<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property int $id
 * @property string $content 内容
 * @property int $user_id 用户id
 * @property string $created_at
 * @property string $updated_at
 * @property int $like 赞同
 * @property int $pid 自评论
 */
class Chat extends \common\models\Chat
{
	/**
	 * 获取最新的留言
	 */
	public static function getThenewestChat()
	{
		$arr = self::find()
			->alias('c')
			->innerJoinWith('user u',false)
			->select(['u.username','c.content','c.created_at','c.pid','c.like'])
			->limit(5)
			->orderBy('created_at desc')
			->asArray()
			->all();
		return $arr;

	}

	public  function getUser()
	{
		return $this->hasOne(User::className(), ['id'=>'user_id']);
	}
}
