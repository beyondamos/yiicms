<?php
namespace app\models;
use app\models\Common;

/**
 * Class Auth
 * @package app\models
 * 权限模型
 *
 */
class Auth extends Common{
    public static function tableName(){
        return 'auth';
    }

    public function rules(){
        return [
            [['auth_name', 'auth_route', 'parent_id', 'auth_type'], 'required'],
            ['auth_name', 'string', 'length' => [2,20]],
            ['parent_id', 'integer', 'min' => 1],
            ['auth_route', 'string', 'length' => [5,30]],
            ['auth_type', 'integer', 'min' => 1, 'max' => 2]
        ];
    }

    public function attributeLabels(){
        return [
            'auth_name' => '权限名称',
            'parent_id' => '上级权限',
            'auth_route' => '权限路由',
            'auth_type' => '权限类型'
        ];
    }
}