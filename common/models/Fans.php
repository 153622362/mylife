<?php

namespace common\models;

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
class Fans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'fans_user_id'], 'required'],
            [['user_id', 'fans_user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
            'fans_user_id' => 'Fans User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
