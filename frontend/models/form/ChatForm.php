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
					$arr[$k]['pid'] = Chat::getCountChatByPid($v['id']);
					$arr[$k]['like'] = Like::getCountLike('2', $v['id']);
					$list = Like::getUserListByChatId('2', $v['id']);
					if (!empty($list)){
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
}
