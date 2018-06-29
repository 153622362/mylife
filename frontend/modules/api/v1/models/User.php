<?php
namespace frontend\modules\api\v1\models;

use yii\helpers\Url;
use yii\web\IdentityInterface;
use yii\web\Link;
use yii\web\Linkable;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends \common\models\User
//	implements Linkable
{
	//要实现接口 yii\web\Linkable
//	public function getLinks()
//	{
//		return [
//			Link::REL_SELF => Url::to(['user/view', 'id' => $this->id], true),
//			'edit' => Url::to(['user/view', 'id' => $this->id], true),
//			'profile' => Url::to(['users/profile/view', 'id' => $this->id], true), //http://localhost/api/users/1?expand=profile
//			'index' => Url::to(['/api/users'], true),
//		];
//	}



}
