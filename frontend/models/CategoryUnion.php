<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "category_union".
 *
 * @property int $id
 * @property int $content_id
 * @property int $category_id
 * @property string $created_at
 * @property string $updated_at
 */
class CategoryUnion extends \common\models\CategoryUnion
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_union';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id', 'category_id'], 'required'],
            [['content_id', 'category_id'], 'integer'],
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
            'content_id' => 'Content ID',
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
