<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_ext".
 *
 * @property int $id
 * @property int $user_id
 * @property string $city 城市
 * @property string $last_log_in
 * @property string $descript
 */
class UserExt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_ext';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'city'], 'required'],
            [['user_id'], 'integer'],
            [['last_log_in'], 'safe'],
            [['city'], 'string', 'max' => 10],
            [['descript'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'city' => 'City',
            'last_log_in' => 'Last Log In',
            'descript' => 'Descript',
        ];
    }
}
