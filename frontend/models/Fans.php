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
	//用户粉丝关联
	public function getUser()
	{
		return $this->hasOne(User::className(), ['id'=>'fans_user_id']);
	}
}
