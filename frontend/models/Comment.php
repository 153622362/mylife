<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $content 评论内容
 * @property int $user_id 评论的用户ID
 * @property int $post_id 文章ID
 * @property string $created_at
 * @property string $updated_at
 * @property int $like 点赞数
 * @property int $pid 子评论
 */
class Comment extends \common\models\Comment
{
	/**
	 * 获取文章评论数
	 */
	public static function getArticleCountComment($article_id)
	{
		$count = self::find()
			->select(['id'])
			->where(['status'=>10, 'post_id'=>$article_id])
			->asArray()
			->count();
		return $count;
	}
}
