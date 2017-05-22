<?php

namespace app\models;

/**
 * Class User
 * @package app\models
 * 用户模型
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface{
    public function rules(){
        return [
            ['username', 'filter', 'filter' => 'trim', 'skipOnArray' => true],
        ];
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

    /**
     * 增加用户
     */
    public function addUser(){

    }

    public function attributeLabels(){
        return [
            'username' => '用户名称',
        ];
    }

}





