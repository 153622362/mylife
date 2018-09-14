<?php

namespace frontend\models\form;

use Chumper\Zipper\Zipper;
use common\models\Sign;
use frontend\models\Post;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SignForm extends Model
{
	//查询当天是否已经签到
	public static function QuerySign()
	{
		$first_day = date('Y-m-d', time()). ' 00:00:00';
		$now = date('Y-m-d H:i:s', time());
		return Sign::find()
			->andWhere(['>=','created_at', $first_day])
			->andWhere(['<=','created_at', $now])
			->andWhere(['user_id'=>\Yii::$app->user->id])
			->asArray()
			->one();
	}
}
