<?php

namespace common\models;

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
class Letter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'letter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sender', 'receiver'], 'required'],
            [['sender', 'receiver', 'status','read_status'], 'integer'],
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
            'content' => 'Content',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
