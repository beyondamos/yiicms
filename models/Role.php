<?php
namespace app\models;

/**
 * Class Role
 * @package app\models
 * 角色模型
 * role_id
 * role_name
 * role_desc
 * role_auth    角色权限列表
 */
class Role extends \app\models\Common {

    public static function tableName(){
        return 'role';
    }

    public function rules(){
        return [
            [['role_name', 'role_desc' ,'role_auth'], 'required'],
            ['role_name', 'string', 'length' => [2,20]],
            ['role_desc', 'string', 'length' => [5,255]],
            ['role_auth', 'string', 'length' => [1,1000]]
        ];
    }

    public function attributeLabels(){
        return [
            'role_name' => '角色名称',
            'role_desc' => '角色描述',
            'role_auth' => '角色权限',
        ];
    }

}