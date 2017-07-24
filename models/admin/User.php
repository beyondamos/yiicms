<?php
namespace app\models\admin;

use app\models\AdminBase;
use Yii;
use app\models\admin\Role;
use yii\base\Security;

/**
 * Class User
 * @package app\models
 * 用户模型
 */
class User extends AdminBase
{
    public $password;   //用户密码
    public $password2;   //重复密码


    public function rules(){
        return [
            [['username', 'email'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            ['username', 'required', 'message' => '用户名不能为空'],
            ['username', 'unique', 'message' => '用户名已经存在'],
            ['username', 'string', 'min' => 2, 'max' => 50],
            ['email', 'required', 'message' => '邮箱不能为空'],
            ['email', 'email', 'message' => '邮箱格式不正确'],
            ['email', 'unique', 'message' => '邮箱已经存在'],
            ['password', 'required', 'message' => '密码不能为空'],
            ['password', 'match', 'pattern' => '/^\w{8,16}$/i', 'message' => '密码必须为数字、字母和下划线的组合'],
            ['password2', 'required', 'message' => '重复密码不能为空'],
            ['password2', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码不一致'],
            ['role_id', 'number', 'min' => 1, 'message' => '必须选择用户角色'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['add'] = ['username', 'email', 'password', 'password2', 'role_id'];
        $scenarios['edit'] = ['username', 'email', 'role_id'];
        return $scenarios;
    }


    public function getRole()
    {
        return $this->hasOne(Role::className(), ['role_id' => 'role_id']);
    }


    /**
     * 根据主键id获得用户
     */
    public static function findIdentity($id){
        return self::findOne(['id' => $id]);
    }


    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * 用来标识 Yii::$app->request->user->id 的返回值
     */
    public function getId(){
        return $this->getPrimaryKey();
    }

    /**
     * 获取auth_key
     */
    public function getAuthKey(){
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     * 验证auth_key
     */
    public function validateAuthKey($authKey){
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
        return $this->password === $password;
    }


    public function login($data)
    {
        $username = trim($data['User']['username']);
        $password = trim($data['User']['password']);
        //验证用户名是否存在
        $user = $this->findOne(['username' => $username]);
        if (!$user) {
            return false;
        }
        //验证密码是否正确
        $security = new Security();
        if (!$security->validatePassword($password, $user->password_hash)) {
            return false;
        }
        return $user->id;
    }


    /**
     * 添加用户
     * @param array $user_data 接收到的post数据
     */
    public function addUser($user_data)
    {
        $this->scenario = 'add';
        if ($this->load($user_data) && $this->validate()) {
            $this->createtime = time();
            $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            if ($this->save(false)) {
                return true;
            } 
            return false;
        } 
        return false;
    }

    /**
     * 编辑用户信息
     * @param  array $user_data 用户信息
     * @return bool  成功返回true 失败返回false
     */
    public function editUser($user_data)
    {
        $this->scenario = 'edit';
        if ($this->load($user_data) && $this->validate()) {
            if ($this->save(false)) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function attributeLabels(){
        return [
            'username' => '用户名',
            'password' => '密码',
            'password2' => '重复密码',
            'email' => '邮箱',
            'role_id' => '用户角色',
        ];
    }





}
