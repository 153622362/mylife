<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "notice".
 *
 * @property int $id
 * @property int $sender
 * @property int $receiver
 * @property string $created_at
 * @property string $updated_at
 * @property string $content
 * @property int $read_status //receiver 0 未读 1已读
 * @property int $status 0 已删除 10正常
 * @property int $category 通知类型 0 评论 1@ 2关注
 */
class Notice extends \common\models\Notice
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sender', 'receiver', 'content'], 'required'],
            [['sender', 'receiver', 'read_status', 'status', 'category'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender' => 'Sender',
            'receiver' => 'Receiver',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'content' => 'Content',
            'read_status' => 'Read Status',
            'status' => 'Status',
            'category' => 'Category',
        ];
    }
}
