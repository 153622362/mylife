<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id 文章ID
 * @property int $status 10正常 0删除
 * @property string $title 标题
 * @property string $descript
 * @property string $content
 * @property string $author 作者
 * @property int $visitor 访客数
 * @property int $post_category 文章类型 0默认分类 1源码 2扩展 3教程
 * @property string $created_at 创建时间
 * @property string $update_at 最后更新时间
 * @property int $post_excellent 精品文章
 * @property int $post_status 1 未解决 2已解决
 * @property int $post_top 1文章置顶
 */
class Post extends \common\models\Post
{
	/**
	 * 获取最新动态文章
	 * @return array
	 */
    public static function getTheNewestDynamic($offset = 0, $file = ['p.id','p.title','p.created_at'], $limit = 10)
	{
		$arr = self::find()
			->alias('p')
			->innerJoinWith('user u', false)
			->select($file)
			->where(['p.status'=>10])
			->orderBy('p.created_at desc')
			->offset($offset * $limit)
			->limit($limit)
			->asArray()
			->all();
		return $arr;

	}


	public static function PostInfoByCa($category, $limit = 10)
	{
		$arr = self::find()
			->alias('p')
			->innerJoinWith('user u',false)
			->select(['p.id','p.post_status','p.title','p.created_at','p.post_category','p.visitor','u.username','u.id uid'])
			->where(['p.status'=>10,'p.post_category'=>$category])
			->orderBy('created_at desc')
			->limit($limit)
			->asArray()
			->all();
		return $arr;
	}

	/**
	 * 获取最新话题文章
	 */
	public static function getTheNewestTopic($limit = 10)
	{
		$arr = self::find()
			->alias('p')
			->innerJoinWith('user u',false)
			->select(['p.id','p.title','p.post_category','u.username','p.created_at'])
			->where(['p.status'=>10,'p.post_category'=>5])
			->orderBy('p.created_at desc')
			->limit($limit)
			->asArray()
			->all();
		return $arr;
	}





	/**
	 * 关联
	 */
	public  function getUser()
	{
		return $this->hasOne(User::className(), ['id'=>'author']);
	}
}
