<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tag_union".
 *
 * @property int $id
 * @property int $content_id
 * @property int $tag_id
 * @property string $created_at
 * @property string $updated_at
 */
class TagUnion extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag_union';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_id'], 'required'],
            [['content_id', 'tag_id'], 'integer'],
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
            'tag_id' => 'Tag ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
