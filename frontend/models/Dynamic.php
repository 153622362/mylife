<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dynamic".
 *
 * @property int $id
 * @property int $user_id
 * @property string $category 1.评论 2.赞 3.签到 4.收藏
 * @property string $created_at
 * @property int $post_id 文章id
 */
class Dynamic extends \common\models\Dynamic
{

}
