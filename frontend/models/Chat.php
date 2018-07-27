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
			->select(['u.username','u.avatar','c.id','c.content','c.created_at','c.pid','c.like','c.user_id','c.id'])
			->limit(10)
			->orderBy('created_at desc')
			->asArray()
			->all();
		return $arr;

	}

	public static function getCountChatByPid($chat_id)
	{
		$count = self::find()
			->where(['pid'=>$chat_id,'deteled'=>0])
			->count();

		return $count;
	}
	public static function getChatByPid($chat_id)
	{
		$arr = self::find()
			->alias('c')
			->innerJoinWith('user u',false)
			->select(['c.id','c.content','c.created_at','u.username','u.avatar'])
			->where(['c.pid'=>$chat_id,'c.deteled'=>0])
			->orderBy('created_at desc')
			->asArray()
			->all();
		return $arr;
	}

	/**
	 * 关联用户表
	 * @return \yii\db\ActiveQuery
	 */
	public  function getUser()
	{
		return $this->hasOne(User::className(), ['id'=>'user_id']);
	}
}
