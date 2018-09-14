<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "score".
 *
 * @property int $id 积分表
 * @property int $score
 * @property string $remark
 * @property int $user_id
 * @property int $category 1.财富 2.威望 3.积分
 * @property string $created_at
 * @property string $updated_at
 */
class Score extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'score';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['score', 'user_id', 'category'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'score' => 'Score',
            'remark' => 'Remark',
            'user_id' => 'User ID',
            'category' => 'Category',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
