<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string $url 图片位置
 * @property string $href 跳转地址
 * @property string $descript 图片描述
 * @property int $is_show 10显示 0不显示
 */
class Banner extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_show'], 'integer'],
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
        ];
    }
}
