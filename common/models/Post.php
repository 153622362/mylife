<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id 文章ID
 * @property int $status 10正常 0删除
 * @property string $title 标题
 * @property string $descript
 * @property string $content
 * @property string $author 作者
 * @property int $visitor 访客数
 * @property int $post_catrgory 文章类型 0默认分类 1源码 2扩展 3教程
 * @property string $created_at 创建时间
 * @property string $update_at 最后更新时间
 * @property int $post_excellent 精品文章
 * @property int $post_status 1 未解决 2已解决
 * @property int $post_top 1文章置顶
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'visitor', 'post_category', 'post_excellent', 'post_status', 'post_top','status'], 'integer'],
            [['title', 'descript', 'content'], 'required'],
            [['created_at', 'update_at'], 'safe'],
            [['title', 'descript', 'content', 'author','post_version'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'title' => 'Title',
            'descript' => 'Descript',
            'content' => 'Content',
            'author' => 'Author',
            'visitor' => 'Visitor',
            'post_catrgory' => 'Post Catrgory',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
            'post_excellent' => 'Post Excellent',
            'post_status' => 'Post Status',
            'post_top' => 'Post Top',
        ];
    }
}
