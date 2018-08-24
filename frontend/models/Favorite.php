<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "favorite".
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $post_id 文章id
 * @property string $created_at
 * @property string $updated_at
 */
class Favorite extends \common\models\Favorite
{

}
