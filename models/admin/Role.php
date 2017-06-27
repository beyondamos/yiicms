<?php
namespace app\models\admin;

use app\models\AdminBase;

/**
 * Class Role
 * @package app\models
 * 角色模型
 * role_id
 * role_name
 * role_desc
 * role_auth    角色权限列表
 */
class Role extends AdminBase {

    public static function tableName()
    {
        return 'role';
    }

    public function rules()
    {
        return [

            [['role_name', 'role_desc'], 'required', 'message' => '{attribute}不能为空'],
            ['role_name', 'string', 'length' => [2,20]],
            ['role_desc', 'string', 'length' => [5,255]],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['add'] = ['role_name', 'role_desc']; 
        return $scenarios;
    }




    public function attributeLabels()
    {
        return [
            'role_name' => '角色名称',
            'role_desc' => '角色描述',
            'role_auth' => '角色权限',
        ];
    }

    /**
     * 添加角色信息
     * @param bool 
     */
    public function addRole($data)
    {
        $this->scenario = 'add';
        if ($this->load($data) && $this->validate()) {
            if (!isset($data['Role']['role_auth'])) {
                $this->addError('role_auth', '角色权限不能为空');
                return false;
            }
            $this->role_auth = implode(',', $data['Role']['role_auth']);
            if ($this->save(false)) {
                return true;
            }
            return false;
        }
        return false;
    }


    public function editRole($data)
    {
        if ($this->load($data) && $this->validate()) {
            if (!isset($data['Role']['role_auth'])) {
                $this->addError('role_auth', '角色权限不能为空');
                return false;
            }
            $this->role_auth = implode(',', $data['Role']['role_auth']);
            if ($this->save(false)) {
                return true;
            }
            return false;
        }
        return false;
    }


}
