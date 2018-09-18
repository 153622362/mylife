<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Base extends \yii\db\ActiveRecord
{
	public function behaviors()
	{
		return [
			[
				'class' => TimestampBehavior::className(),
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
					ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
				],
				// if you're using datetime instead of UNIX timestamp:
				'value' => new Expression('NOW()'),
			],
		];
	}
}
