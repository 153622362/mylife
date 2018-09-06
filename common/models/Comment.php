<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $content 评论内容
 * @property int $user_id 评论的用户ID
 * @property int $post_id 文章ID
 * @property string $created_at
 * @property string $updated_at
 * @property int $like 点赞数
 * @property int $pid 子评论
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'post_id', 'like', 'pid','unlike'], 'integer'],
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
            'content' => 'Content',
            'user_id' => 'User ID',
            'post_id' => 'Post ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'like' => 'Like',
            'pid' => 'Pid',
        ];
    }

    public function getUser()
	{
		return $this->hasOne(User::className(), ['id'=>'user_id']);
	}
}
