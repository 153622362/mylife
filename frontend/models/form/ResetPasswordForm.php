<?php
namespace frontend\models\form;

use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\User;

/**
 * 修改密码表单
 */
class ResetPasswordForm extends Model
{
	public $old_password;
    public $new_password;
	public $comfirm_password;

	public $content;



	public function attributeLabels()
	{
		return [
			'old_password' => '当前账户密码',
			'new_password' => '新的密码',
			'comfirm_password' => '再次输入新的密码',
		];
	}
    /**
     * @var \common\models\User
     */
//    private $user_password;
	private $_user; //user 对象


    public function __construct($config = [])
    {
        $this->_user = User::findOne(\Yii::$app->user->id);
//		$this->user_password = $this->_user->password;
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['old_password','new_password','comfirm_password'], 'required', 'message' => '此选项不能为空'],
            ['old_password', 'validatePassword'], //检测密码是否相同
			['comfirm_password', 'compare', 'compareAttribute' => 'new_password', 'operator' => '==', 'message' => '输入的两次密码不一致'], //检测密码是否相同
            [['old_password','new_password','new_password'], 'string', 'min' => 6, 'message' => '密码强度至少为6位数字字母混合字符串'],
        ];
    }

	public function validatePassword($attribute, $params)
	{
		if (!$this->hasErrors()) {
			$user = $this->getUser();
			if (!$user || !$user->validatePassword($this->old_password)) {
				$this->addError($attribute, '当前输入的密码不正确');
			}
		}
	}

	protected function getUser()
	{
		if ($this->_user === null) {
			$this->_user = User::findOne(['id'=>\Yii::$app->user->id]);
		}

		return $this->_user;
	}

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->new_password);
        $user->removePasswordResetToken();
        return $user->save(false);
    }
}
