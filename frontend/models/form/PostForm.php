<?php

namespace frontend\models\form;

use Chumper\Zipper\Zipper;
use common\models\User;
use frontend\models\Comment;
use frontend\models\Fans;
use frontend\models\Favorite;
use frontend\models\Like;
use frontend\models\Post;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class PostForm extends Model
{
	/**
	 * 获取最新动态文章
	 * @return array
	 */
	public static function getTheNewestDynamic()
	{
		$arr = Post::getTheNewestDynamic();
		if (!empty($arr)){
			return $arr;
		}
	}

	/**
	 * 获取最新问答文章
	 */
	public static function getTheNewestQuestion()
	{
		$arr = Post::getTheNewestQuestion();
		if (!empty($arr)){
			foreach ($arr as $k =>$value)
			{
				$count = Comment::getArticleCountComment($value['id']);
				$arr[$k]['count'] = $count;
			}
			return $arr;
		}
	}

	/**
	 * 获取最新话题文章
	 */
	public static function getTheNewestTopic()
	{
		$arr = Post::getTheNewestTopic();
		if (!empty($arr)){
			foreach ($arr as $k =>$value)
			{
				$count = Comment::getArticleCountComment($value['id']);
				$arr[$k]['count'] = $count;
			}
			return $arr;
		}
	}

	/**
	 * 获取最新教程文章
	 */
	public static function getTheNewestCourse()
	{
		$arr = Post::getTheNewestCourse();
		if (!empty($arr)){
			return $arr;
		}
	}

	/**
	 * 获取最新扩展文章
	 */
	public static function getTheNewestExtension()
	{
		$arr = Post::getTheNewestExtension();
		if (!empty($arr)){
			return $arr;
		}
	}

	/**
	 * 获取最新源码文章
	 */
	public static function getTheNewestOriginCode()
	{
		$arr = Post::getTheNewestOriginCode();
		if (!empty($arr)){
			return $arr;
		}
	}

//	获取热门动态(一周内)
	public static function hotestDynamic()
	{
		$time = time();
		$start_time = date('Y-m-d h:i:s', $time - 7 * 86400);
		$data = Post::find()
			->select(['title','id'])
			->where(['status'=>10])
			->where(['>=','updated_at',$start_time])
			->limit(10)
			->orderBy('visitor desc')
			->asArray()
			->all();
		return $data;
	}

	//根据ID获取文章信息
	public static function PostInfoById($post_id)
	{
		$data = Post::find()
			->alias('p')
			->innerJoinWith('user u', false)
			->select(['p.id','p.title','p.content','p.visitor','p.created_at','p.updated_at','p.author','u.username'])
			->where(['p.id'=>$post_id,'p.status'=>10])
			->asArray()
			->one();
		return $data;
	}

	//文章点赞数
	public static function PostLikeByID($post_id)
	{
		$count = Like::find()
			->where(['channel'=>1,'content_id'=>$post_id])
			->count();
		return $count;
	}
	//文章收藏数
	public static function PostFavByID($post_id)
	{
		$count = Favorite::find()
			->where(['post_id'=>$post_id])
			->count();
		return $count;
	}
	//文章评论数
	public static function PostComByID($post_id)
	{
		$count = Comment::find()
			->where(['post_id'=>$post_id])
			->count();
		return $count;
	}
	
	//点赞信息
	public static function PostLikeInfoById($post_id)
	{
		$count = Like::find()
			->alias('l')
			->innerJoinWith('user u', false)
			->select(['u.id','u.avatar'])
			->where(['l.channel'=>1,'l.content_id'=>$post_id])
			->asArray()
			->all();
		return $count;
	}

	//评论信息
	public static function PostComInfoById($post_id)
	{
		$data = Comment::find()
			->alias('c')
			->innerJoinWith('user u', false)
			->select(['c.created_at','c.content','u.avatar','u.username','u.id uid','c.id','c.like','c.unlike'])
			->where(['post_id'=>$post_id,'pid'=> 0])
			->asArray()
			->all();
		return $data;
	}

	//根据文章信息获取用户新
	public static function UserInfo($article)
	{
		if (!empty($article['author']))
		{
			$data = User::find()
				->alias('u')
				->innerJoinWith('userext ue',false)
				->select(['u.id','u.avatar','u.username','u.created_at','ue.wealth_score','ue.honor_score','ue.score','ue.city','ue.last_log_in'])
				->where(['u.id'=>$article['author']])
				->asArray()
				->one();
			return $data;
		}
	}
	//用户粉丝总数
	public static function FanCount($user_id)
	{
		if (!empty($user_id)){
		$count = Fans::find()
			->where(['user_id'=>$user_id])
			->count();
		return $count;
		}
	}

	//评论的赞数
	public static function ComLikeCount($cid)
	{
		$count = Like::find()
			->where(['channel'=>3,'content_id'=>$cid])
			->count();
		return $count;
	}

	//评论的踩数
	public static function ComUnlikeCount($cid)
	{
		$count = Like::find()
			->where(['channel'=>4,'content_id'=>$cid])
			->count();
		return $count;
	}

	//是否收藏
	public static function isFav($user_id, $post_id)
	{
		$count = Favorite::find()
			->where(['user_id'=> $user_id, 'post_id'=> $post_id])
			->count();
		return $count;
	}

	//是否点赞
	public static function isLike($user_id, $post_id)
	{
		$count = Like::find()
			->where(['user_id'=>$user_id,'channel'=>1,'content_id'=>$post_id])
			->count();
		return $count;
	}


	//此条评论是否点赞
	public static function isCLike($user_id, $cid)
	{
		$count = Like::find()
			->where(['user_id'=>$user_id,'channel'=>3,'content_id'=>$cid])
			->count();
		return $count;
	}

	//此条评论是否踩
	public static function isCUnlike($user_id, $cid)
	{
		$count = Like::find()
			->where(['user_id'=>$user_id,'channel'=>4,'content_id'=>$cid])
			->count();
		return $count;

	}

	public static function childChild($pid, $post_id)
	{
		$data = Comment::find()
			->alias('c')
			->innerJoinWith('user u', false)
			->select(['c.id','c.content','c.like','c.unlike','c.created_at','u.id uid','u.avatar','u.username'])
			->where(['c.pid'=>$pid, 'c.post_id'=>$post_id])
			->asArray()
			->all();
		return $data;
	}



}
