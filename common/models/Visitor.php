<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "visitor".
 *
 * @property int $id
 * @property int $category //1 用户中心
 * @property int $user_id 被访问者id
 * @property int $visitor_id 访问者id
 */
class Visitor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visitor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'user_id', 'visitor_id'], 'required'],
            [['category', 'user_id', 'visitor_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'user_id' => 'User ID',
            'visitor_id' => 'Visitor ID',
        ];
    }


}
