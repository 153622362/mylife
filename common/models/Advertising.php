<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advertising".
 *
 * @property int $id
 * @property string $url 广告图片位置
 * @property string $href 广告跳转位置
 * @property string $descript 广告文字描述
 * @property int $is_show 10显示 0不显示
 * @property string $created_at
 * @property string $updated_at
 */
class Advertising extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertising';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_show'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['url', 'href', 'descript'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'href' => 'Href',
            'descript' => 'Descript',
            'is_show' => 'Is Show',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
