<?php

namespace frontend\models\form;

use Chumper\Zipper\Zipper;
use frontend\models\Chat;
use frontend\models\Like;
use frontend\models\Post;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ChatForm extends Model
{
		public static function getThenewestChat()
		{
			$arr = Chat::getThenewestChat();
			if (!empty($arr))
			{
				foreach ($arr as $k =>$v)
				{
					$nowtime = time();
					$chat_time = strtotime($v['created_at']);
					$diff = $nowtime - $chat_time;
					if ($diff < 3600)
					{
						$min = floor($diff / 60);
						$content = "{$min}分钟前";
						if ($min < 1)
						{
							$min = $diff % 60;
							$content = "{$min}秒前";
						}
					}elseif($diff >= 3600 && $diff < 86400){
						$min = floor($diff / 3600);
						$content = "{$min}小时前";
					}else{
						$min = floor($diff / 86400);
						$content = "{$min}天前";
					}
					$arr[$k]['created_at'] = $content;
					$arr[$k]['pid'] = Chat::getCountChatByPid($v['id']); //获取留言数
					$arr[$k]['like'] = Like::getCountLike('2', $v['id']); //获取点赞数
					$list = Like::getUserListByChatId('2', $v['id']);
					if (!empty($list)){
						//判断当前用户是否对当前message进行了赞
						if (in_array(Yii::$app->user->id, $list))
						{
							$arr[$k]['zan'] = 1;
						}else{
							$arr[$k]['zan'] = 0;
						}
					}else{
						$arr[$k]['zan'] = 0;
					}
				}

				return $arr;
			}
		}


	//根据ID获取聊天信息
	public static function ChatInfoById($chat_id)
	{
		$data = Chat::find()
			->alias('c')
			->innerJoinWith('user u', false)
			->select(['c.id','c.content','c.created_at','c.user_id','u.username'])
			->where(['c.id'=>$chat_id,'c.deteled'=>0])
			->asArray()
			->one();
		return $data;
	}

	//点赞数
	public static function ChatLikeByID($chat_id)
	{
		$count = Like::find()
			->where(['channel'=>2,'content_id'=>$chat_id])
			->count();
		return $count;
	}

	//评论数
	public static function ChatComByID($chat_id)
	{
		$count = Chat::find()
			->where(['pid'=>$chat_id])
			->count();
		return $count;
	}

	//点赞信息
	public static function ChatLikeInfoById($chat_id)
	{
		$count = Like::find()
			->alias('l')
			->innerJoinWith('user u', false)
			->select(['u.id','u.avatar'])
			->where(['l.channel'=>2,'l.content_id'=>$chat_id])
			->asArray()
			->all();
		return $count;
	}

	//评论信息
	public static function ChatComInfoById($chat_id)
	{
		$data = Chat::find()
			->alias('c')
			->innerJoinWith('user u', false)
			->select(['c.created_at','c.content','u.avatar','u.username','u.id uid','c.id'])
			->where(['c.pid'=> $chat_id])
			->asArray()
			->all();
		return $data;
	}

	//是否点赞
	public static function isLike($user_id, $chat_id)
	{
		$count = Like::find()
			->where(['user_id'=>$user_id,'channel'=>2,'content_id'=>$chat_id])
			->count();
		return $count;
	}

	public static function childChild($chat_id)
	{
		$data = Chat::find()
			->alias('c')
			->innerJoinWith('user u', false)
			->select(['c.id','c.content','c.created_at','u.id uid','u.avatar','u.username'])
			->where(['c.pid'=>$chat_id])
			->asArray()
			->all();
		return $data;
	}
}
