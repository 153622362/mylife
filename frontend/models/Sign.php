<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sign".
 *
 * @property int $id
 * @property int $user_id
 * @property string $created_at
 */
class Sign extends \common\models\Sign
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sign';
    }

}
