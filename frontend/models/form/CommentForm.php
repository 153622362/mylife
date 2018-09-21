<?php

namespace frontend\models\form;

use Chumper\Zipper\Zipper;
use common\models\User;
use frontend\models\Comment;
use frontend\models\Post;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CommentForm extends Model
{
	public static  function NewestComment()
	{
		$data = Comment::find()
			->alias('c')
			->innerJoinWith('user u', false)
			->select(['c.id cid','c.content','c.created_at','c.post_id','u.id uid','u.avatar','u.username'])
			->orderBy('created_at desc')
			->asArray()
			->all();
		if (!empty($data))
		{
			foreach ($data as $k=>$v)
			{
				$arr = explode('@ngyhd@', $v['content']);
				if (!empty($arr[1]) && !empty(intval($arr[1])))
				{
					$data[$k]['content'] = $arr['2'];
				}
			}
		}
		return $data;
	}
}
