<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string $tag_name
 * @property string $created_at
 * @property string $updated_at
 */
class Tag extends \common\models\Tag
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['tag_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_name' => 'Tag Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function gettagunion()
	{
		return $this->hasMany(TagUnion::className(), ['tag_id'=>'id']);
	}
}
