<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "like".
 *
 * @property int $id
 * @property int $user_id 点赞用户
 * @property int $channel 点赞场景 1文章  2聊天室
 * @property int $content_id 内容id
 */
class Like extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'like';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'channel', 'content_id'], 'integer'],
			[['created_at','updated_at'],'string']
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
            'channel' => 'Channel',
            'content_id' => 'Content ID',
        ];
    }


}
