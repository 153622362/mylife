<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "letter".
 *
 * @property int $id
 * @property int $sender
 * @property int $receiver
 * @property string $content
 * @property int $status 0 删除 10正常
 * @property string $created_at
 * @property string $updated_at
 */
class Letter extends \common\models\Letter
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'letter';
    }

    public function getUser()
	{
		return $this->hasOne(User::className(), ['id'=>'sender']);
	}


}
