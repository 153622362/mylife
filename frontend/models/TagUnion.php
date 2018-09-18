<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tag_union".
 *
 * @property int $id
 * @property int $content_id
 * @property string $created_at
 * @property string $updated_at
 */
class TagUnion extends \common\models\TagUnion
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
            [['content_id'], 'integer'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function gettag()
	{
		return $this->hasOne(Tag::className(), ['id'=>'tag_id']);
	}
}
