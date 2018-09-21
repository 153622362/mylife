<?php

namespace frontend\models\form;

use common\models\Favorite;
use common\models\User;
use frontend\models\Comment;
use frontend\models\Dynamic;
use frontend\models\Post;
use frontend\models\Score;
use frontend\models\Visitor;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class UserForm extends Model
{
	public static function addComment($user_id,$post_id,$content)
	{
		$res = false;
		if (!empty($content) && !empty($post_id)) {
			$comment_obj = new Comment();
			$comment_obj->content = $content;
			$comment_obj->user_id = $user_id;
			$comment_obj->post_id = $post_id;
			$res = $comment_obj->save();
		}
		return $res;
	}

	public static function userScore($user_id)
	{
		$data['wealth'] = Score::find() //财富
			->where(['user_id'=>$user_id,'category'=>1])
			->sum('score')?:0;
		$data['honor'] = Score::find() //威望
			->where(['user_id'=>$user_id,'category'=>2])
			->sum('score')?:0;
		$data['score'] = Score::find() //积分
			->where(['user_id'=>$user_id,'category'=>3])
			->sum('score')?:0;
		return $data;

	}
	//获取用户基本信息
	public static function userInfo($user_id)
	{
		return User::find()
			->alias('u')
			->innerJoinWith('userext ue', false)
			->select(['u.id','u.username','u.created_at','u.avatar','ue.city','ue.descript','ue.last_log_in'])
			->where(['u.id'=>$user_id])
			->asArray()
			->one();
	}

	//获取用户关注
	public static function userFavorite($user_id)
	{
		return \common\models\Fans::find()
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
			->where(['user_id'=>$user_id,'category' => 1])
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


	public static function sendEmail($to_email,$token,$param=[])
	{
		if (!empty($param))
		{
			$url = \Yii::$app->urlManager->createAbsoluteUrl(['/user/reset-email','token'=>$token,'str'=>$param['str']]);
		}else{
			$url = \Yii::$app->urlManager->createAbsoluteUrl(['/user/reset-email','token'=>$token]);
		}
		$mailer = \Yii::$app->mailer;
		$res = $mailer
			->compose()
			->setFrom('164271849@qq.com')
			->setTo($to_email)
			->setSubject('【'.\Yii::$app->name.'】邮箱绑定验证')
			->setHtmlBody("请点击下面的链接进行下一步的操作;<a href='".$url."'>激活链接</a>")    //发布可以带html标签的文本
			->send();
		return $res;

	}

}
