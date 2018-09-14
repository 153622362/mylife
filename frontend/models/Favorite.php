<?php

namespace frontend\models;

use common\models\Post;
use common\models\User;
use Yii;

/**
 * This is the model class for table "favorite".
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $post_id 文章id
 * @property string $created_at
 * @property string $updated_at
 */
class Favorite extends \common\models\Favorite
{
		//关联文章模型
		public function getPost()
		{
			return $this->hasOne(Post::className(), ['id'=>'post_id']);
		}

		//关联用户模型
		public function getUser()
		{
			return $this->hasOne(User::className(), ['id'=>'user_id']);
		}
}
