<?php
namespace app\models\admin;

use app\models\AdminBase;
use Yii;
use yii\captcha\Captcha;
use app\models\admin\User;
use yii\base\Security;

/**
 * 后台登录模型
 */
class LoginForm extends AdminBase
{
    public $username;
    public $password;
    public $verifyCode;

    public function rules()
    {
        return [
            ['verifyCode', 'captcha', 'captchaAction' => 'admin/login/captcha', 'message' => '验证码错误'],
            [['username', 'password', 'verifyCode'], 'required', 'message' => "{attribute}不能为空"],
            ['password', 'validateUser']

        ];
    }



    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'verifyCode' => '验证码'
        ];
    }


    public function validateUser($attribute,$parmas)
    {
        $username = trim($this->username);
        $password = trim($this->password);
        $user = User::findOne(['username' => $username]);
        if (!$user) {
            $this->addError($attribute,'用户名或者密码错误');
        }
        //验证密码是否正确
        $security = new Security();
        if (!$security->validatePassword($this->password, $user->password_hash)) {
            $this->addError($attribute,'用户名或者密码错误');
        }

    }


}
