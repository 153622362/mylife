<?php

namespace frontend\models\form;

use common\models\Favorite;
use common\models\User;
use frontend\models\Dynamic;
use frontend\models\Post;
use frontend\models\Visitor;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class UserForm extends Model
{
	//获取用户基本信息
	public static function userInfo($user_id)
	{
		return User::find()
			->alias('u')
			->innerJoinWith('userext ue', false)
			->select(['u.id','u.username','u.created_at','u.avatar','ue.city','ue.descript','ue.last_log_in','ue.wealth_score','ue.honor_score','ue.score'])
			->where(['u.id'=>$user_id])
			->asArray()
			->one();
	}

	//获取用户关注
	public static function userFavorite($user_id)
	{
		return \frontend\models\Fans::find()
			->alias('f')
			->innerJoinWith('user u', false)
			->select(['u.id','u.avatar'])
			->where(['f.fans_user_id' => $user_id])
			->asArray()
			->all();

	}

	//获取用户粉丝
	public static function userFans($user_id)
	{
		return \frontend\models\Fans::find()
			->alias('f')
			->innerJoinWith('user u', false)
			->select(['u.id','u.avatar'])
			->where(['f.user_id' => $user_id])
			->asArray()
			->all();
	}

	//获取用户访客
	public static function userVisitors($user_id)
	{
		return Visitor::find()
			->alias('v')
			->innerJoinWith('user u', false)
			->select(['u.id','u.avatar'])
			->where(['user_id'=>$user_id,'visitor_id'=>$user_id,'category' => 1])
			->asArray()
			->all();
	}

	//获取用户的所有动态
	public static function dynamic($user_id)
	{
		$dynamic = Dynamic::find()
			->where(['user_id'=> $user_id])
			->limit(10)
			->asArray()
			->all();
		foreach ($dynamic as $k =>$v)
		{
			$dynamic[$k] = self::dynamic_category($v); //对数据进行处理
		}
		return $dynamic;
	}

	public static function dynamic_category($arr)
	{
		switch ($arr['category'])
		{
			case 1;
				$tmp = '评论了';
				break;
			case 2;
				$tmp = '赞了';
				break;
			case 3;
				$tmp = '已签到';
				break;
			case 4;
				$tmp = '收藏了';
				break;
		}
		$arr['category'] = $tmp;
		if ($arr['other_id'] > 0)
		{
			switch ($arr['other_category'])
			{
				case 1: //文章
					$arr['other_category'] = '文章';
					$tmp = Post::find()->select(['title'])->where(['id'=>$arr['other_id']])->asArray()->one();
					break;
				case 2: //话题
					$arr['other_category'] = '文章';
					$tmp = Post::find()->select(['title'])->where(['id'=>$arr['other_id']])->asArray()->one();
					break;

			}
		}
		if (!empty($tmp) && !is_string($tmp)){
			$arr['title'] = $tmp['title'];
		}
		return $arr;

	}

}
