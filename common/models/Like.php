<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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
