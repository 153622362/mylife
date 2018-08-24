<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "like".
 *
 * @property int $id
 * @property int $user_id 点赞用户
 * @property int $channel 点赞场景 1文章  2聊天室
 * @property int $content_id 内容id
 */
class Like extends \yii\db\ActiveRecord
{
	/**
	 * 获取赞数
	 */
	public static function getCountLike($channel,$content_id)
	{
		$count = self::find()
			->where(['channel'=>$channel,'content_id'=>$content_id])
			->count();
		return $count;
	}

	/**
	 * 根据内容id获取赞用户
	 */
	public static function getUserListByChatId($channel,$content_id)
	{
	    $res = [];
		$arr = self::find()
			->select(['user_id'])
			->where(['channel'=>$channel,'content_id'=>$content_id])
			->asArray()
			->all();
		if (!empty($arr))
		{
			foreach ($arr as $v){
				array_push($res, $v['user_id']);
			}
		}
		return $res;
	}
}
