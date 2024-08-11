<?php

namespace frontend\models\form;

use common\models\User;
use frontend\models\Comment;
use frontend\models\Fans;
use frontend\models\Favorite;
use frontend\models\Like;
use frontend\models\Post;
use frontend\models\TagUnion;
use Yii;
use yii\base\Model;
use yii\db\Expression;

/**
 * ContactForm is the model behind the contact form.
 */
class PostForm extends Model
{
	public $verifyCode; //验证码
	public $tag;
	public $content;


	public function rules()
	{
		return [
			['tag', 'tagFilter'],
			['verifyCode', 'captcha'],
		];
	}

	public function tagFilter($attribute, $param)
	{
		if (!empty($this->tag) && is_array($this->tag)){
			foreach ($this->tag as $k=>$v)
			{
				$arr[] = strip_tags(trim($v));
			}
			$this->tag = $arr;
		}
	}

	public static function addVisistor($post_id)
	{
		Post::findOne($post_id);
		if (!empty($post_id)){
			Yii::$app->db->createCommand()->upsert('post', ['id'=> $post_id],['visitor'=> new Expression('visitor + 1')])->execute(); //访问+1
		}
	}
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
	public static function PostInfo($category)
	{
		$arr = Post::PostInfoByCa($category);
		if (!empty($arr)){
			foreach ($arr as $k =>$value)
			{
				$post_id = $value['id'];
				$arr[$k]['cfav'] = PostForm::PostFavByID($post_id); //收藏数
				$arr[$k]['count'] = PostForm::PostComByID($post_id); //评论数
			}
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
	public static function PostInfoById($post_id, $user_id)
	{
		$dependency = new \yii\caching\DbDependency(['sql' => "select updated_at from post where id ={$post_id}"]);
		$cache = Yii::$app->cache;
		$data =$cache->getOrSet('post_'.$post_id, function () use ($post_id){
			//不存在则用回调函数
//			User::find()->cache(7200)->all();//查询缓存
//			$result = Customer::getDb()->cache(function ($db) {
//				return Customer::find()->where(['id' => 1])->one();
//			}); //查询缓存
			return Post::find()
				->alias('p')
				->innerJoinWith('user u', false)
				->select(['p.id','p.title','p.content','p.visitor','p.created_at','p.updated_at','p.author','u.username'])
				->where(['p.id'=>$post_id,'p.status'=>10])
				->asArray()
				->one();
		}, 30, $dependency);
		$data['clike'] = self::PostLikeByID($post_id); //点赞数
		$data['cfav'] = self::PostFavByID($post_id); //收藏数
		$data['ccom'] = self::PostComByID($post_id); //评论数
		$fav = PostForm::isFav($user_id, $post_id);
		$like = PostForm::isLike($user_id, $post_id);
		$data['ulike'] = $like > 0 ? 1 : 0; //用户是否已点赞
		$data['ufav'] = $fav > 0 ? 1 : 0; //用户是否已收藏
		$data['likeinfo'] = PostForm::PostLikeInfoById($post_id); //点赞信息
		$data['cominfo'] = PostForm::PostComInfoById($post_id); //评论信息
		self::addVisistor($post_id); //文章阅读+1
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
			->where(['post_id'=>$post_id,'pid'=>0])
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
			->where(['c.post_id'=>$post_id,'c.pid'=> 0])
			->asArray()
			->all();
		return $data;
	}

	//根据文章信息获取用户新
	public static function UserInfo($article, $user_id)
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

			$data['cfan'] = PostForm::FanCount($article['author']); //用户粉丝数
			$data['score'] = UserForm::userScore($article['author']); //积分
			$data['isfan'] = Fans::findOne(['user_id'=>$article['author'], 'fans_user_id'=>$user_id]); //是否关注文章作者
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

	public static function postTag($post_id)
	{
		$data = TagUnion::find()
			->alias('tu')
			->innerJoinWith('tag t', false)
			->select(['t.tag_name','t.id'])
			->where(['tu.content_id'=>$post_id])
			->asArray()
			->all();
		if (!empty($data))
		{
			foreach ($data as $k=>$v)
			{
				$data['tag'][$v['id']] = $v['tag_name'];
			}
		}
		return $data['tag']??'';

	}
}
