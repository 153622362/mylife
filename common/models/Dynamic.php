<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dynamic".
 *
 * @property int $id
 * @property int $user_id
 * @property string $category 1.评论 2.赞 3.签到 4.收藏
 * @property string $created_at
 * @property int $other_category 1.文章id 2.话题id
 * @property int $other_id id
 * @property string $remark
 */
class Dynamic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dynamic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'category'], 'required'],
            [['user_id', 'other_category', 'other_id'], 'integer'],
            [['created_at'], 'safe'],
            [['category', 'remark'], 'string', 'max' => 255],
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
            'category' => 'Category',
            'created_at' => 'Created At',
            'other_category' => 'Other Category',
            'other_id' => 'Other ID',
            'remark' => 'Remark',
        ];
    }
}
