<?php
namespace frontend\modules\api\v1\models;

use yii\filters\RateLimitInterface;
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
class User extends \common\models\User implements
//	Linkable //	要实现接口 yii\web\Linkable
	IdentityInterface
{
	public function rules()
	{
		return [
			[['username', ], 'required'],
			[['status', 'created_at', 'updated_at'], 'integer'],
			[['username', 'password_hash', 'password_reset_token', 'access_token', 'tmp_email', 'email', 'avatar'], 'string', 'max' => 255],
			[['auth_key'], 'string', 'max' => 32],
			[['username'], 'unique'],
			[['email'], 'unique'],
			[['password_reset_token'], 'unique'],
			[['auth_key', 'password_hash','allowance','allowance_updated_at'], 'safe']
		];
	}

//	public function getLinks()
//	{
//		//返回链接集合
//		return [
//			Link::REL_SELF => Url::to(['user/view', 'id' => $this->id], true),
//			'edit' => Url::to(['user/view', 'id' => $this->id], true),
//			'profile' => Url::to(['user/profile/view', 'id' => $this->id], true), //http://localhost/api/users/1?expand=profile
//			'index' => Url::to(['user/index'], true),
//		];
//	}
	// 过滤掉一些字段
	public function fields()
	{
//		$fields = parent::fields();
		// 删除一些包含敏感信息的字段
//		unset($fields['auth_key'], $fields['password_hash'], $fields['password_reset_token'], $fields['access_token'],$fields['tmp_email'],$fields['created_at'],$fields['updated_at'],$fields['status'],$fields['email']);
//		return $fields;
		return [
			'id',
			'username',
			'头像'=>'avatar',
			'id+name' => function ($model) {
				return $model->id . ' ' . $model->username;
			},
		];
	}

	public  $profile;
	//额外的字段
	//http://localhost?fileds=id,username&expand=profile
	public function extraFields()
	{
		$this->profile = 2;
		return ['profile'];
	}

	public static function findIdentityByAccessToken($token, $type = null)
	{
		return static::findOne(['access_token' => $token]);
	}


}
