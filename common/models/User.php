<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\filters\RateLimitInterface;


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
class User extends ActiveRecord implements IdentityInterface,
	 RateLimitInterface
{


    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
	//限流
	public function getRateLimit($request, $action)
	{
		return [2, 10]; // $rateLimit requests per second 						limit seconds
	}

	public function loadAllowance($request, $action)
	{
		return [1, time()];
	}

	public function saveAllowance($request, $action, $allowance, $timestamp)
	{
//		$this->allowance = $allowance;
//		$this->allowance_updated_at = $timestamp;
//		$this->save();
	}

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
			[['avatar','tmp_email'],'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
	 * restful api授权验证
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
		return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getAvatar()
	{
		return $this->avatar;
	}

	public function getuserext()
	{
		return $this->hasOne(UserExt::className(), ['user_id'=>'id']);
	}



	//API 明确列出每个字段，适用于你希望数据表或
// 模型属性修改时不导致你的字段修改（保持后端API兼容性）
//	public function fields()
//	{
//		return [
//			// 字段名和属性名相同
//			'id',
//			// 字段名为"email", 对应的表字段属性名为"email"
////			<email>153622362@qq.com</email>
//			'email' => 'email',
////			// 字段名为"name", 值由一个PHP回调函数定义
////			'name' => function ($model) {
////				return $model->first_name . ' ' . $model->last_name;
////			},
//		];
//	}

// 过滤掉一些字段，适用于你希望继承
// 父类实现同时你想屏蔽掉一些敏感字段
	public function fields()
	{
		$fields = parent::fields();

		// 删除一些包含敏感信息的字段
		unset($fields['auth_key'], $fields['password_hash'], $fields['password_reset_token']);

		return $fields;
	}

	public  $profile;
	//额外的字段
	//http://localhost?expand=obj
	public function extraFields()
	{
		$this->profile = User::findOne(1); //额外的字段
		return ['profile'];
	}
}
