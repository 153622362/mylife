<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "fans".
 *
 * @property int $id
 * @property int $user_id 被关注者
 * @property int $fans_user_id 关注者
 * @property string $created_at
 * @property string $updated_at
 */
class Fans extends \common\models\Fans
{
	public function getUser()
	{
		return $this->hasOne(User::className(), ['id'=>'user_id']);
	}
}
