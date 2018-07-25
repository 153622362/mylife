<?php

namespace frontend\models\form;

use Chumper\Zipper\Zipper;
use frontend\models\Comment;
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

}
