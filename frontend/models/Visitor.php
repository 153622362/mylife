<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "visitor".
 *
 * @property int $id
 * @property int $category //1 用户中心
 * @property int $user_id 被访问者id
 * @property int $visitor_id 访问者id
 */
class Visitor extends \common\models\Visitor
{
	public function getUser()
	{
		return $this->hasOne(User::className(), ['id'=>'user_id']);
	}

}
