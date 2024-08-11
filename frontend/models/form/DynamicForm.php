<?php

namespace frontend\models\form;

use frontend\models\Category;
use frontend\models\Chat;
use frontend\models\Comment;
use frontend\models\Favorite;
use frontend\models\Like;
use frontend\models\Post;
use frontend\models\Tag;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class DynamicForm extends Model
{
	static public $fileds = ['p.id','p.title','p.created_at','p.updated_at','p.post_category','p.visitor','u.username','u.avatar','u.id uid'];

	//获取分类文章列表
	public static function categoryPost($category,  $page, $limit)
	{
		$category_arr = Category::find()
			->alias('c')
			->innerJoinWith('categoryunion cu', false)
			->select(['cu.content_id'])
			->where(['c.id'=>$category])
			->asArray()
			->all();
		$category_content_id_arr = [];
		if (!empty($category_arr)){
			foreach ($category_arr as $v)
			{
				$category_content_id_arr[] = $v['content_id'];
			}
		}
		$data['dy'] = Post::find()
			->alias('p')
			->innerJoinWith('user u', false)
			->select(self::$fileds)
			->where(['in','p.id',$category_content_id_arr])
			->offset($page * $limit)
			->asArray()
			->limit($limit)
			->all();
		$data['count'] = Post::find()
			->alias('p')
			->where(['in','p.id',$category_content_id_arr])
			->count();
		return $data;
	}
	//获取标签文章列表
	public static function tagPost($tag, $page, $limit)
	{
		$tag_arr = Tag::find()
			->alias('t')
			->innerJoinWith('tagunion tu', false)
			->select(['tu.content_id'])
			->where(['t.id'=>$tag])
			->asArray()
			->all();
		$tag_content_id_arr = [];
		if (!empty($tag_arr)){
			foreach ($tag_arr as $v)
			{
				$tag_content_id_arr[] = $v['content_id'];
			}
		}
		$data['dy'] = Post::find()
			->alias('p')
			->innerJoinWith('user u', false)
			->select(self::$fileds)
			->where(['in','p.id',$tag_content_id_arr])
			->offset($page * $limit)
			->asArray()
			->limit($limit)
			->all();
		$data['count'] = Post::find()
			->alias('p')
			->where(['in','p.id',$tag_content_id_arr])
			->count();
		return $data;
	}

	//处理文章数据
	public static function dealPost($data)
	{
		$arr = [];
		$category_arr = Category::find()->asArray()->all();
		if (!empty($category_arr)){
			foreach ($category_arr as $v)
			{
				$arr[$v['id']] = $v['name'];
			}
		}
		foreach ($data['dy'] as $k=>$v)
		{
			$data['dy'][$k]['comment'] = Comment::find()->where(['post_id'=>$v['id'],'pid'=>0])->count(); //评论数
			$data['dy'][$k]['favorite'] = Favorite::find()->where(['post_id'=>$v['id']])->count(); //收藏数
			$data['dy'][$k]['post_category'] = $arr[$v['post_category']]??''; //分类
		}
		return $data;
	}

}
