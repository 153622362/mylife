<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use common\models\Post;
use common\models\User;

/**
 * This is the model class for table "favorite".
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $post_id 文章id
 * @property string $created_at
 * @property string $updated_at
 */
class Favorite extends \yii\db\ActiveRecord
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
        return 'favorite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'post_id'], 'integer'],
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
            'post_id' => 'Post ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

	//关联文章模型
	public function getPost()
	{
		return $this->hasOne(Post::className(), ['id'=>'post_id']);
	}

	//关联用户模型
	public function getUser()
	{
		return $this->hasOne(User::className(), ['id'=>'user_id']);
	}
}
