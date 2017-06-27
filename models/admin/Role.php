<?php
namespace app\models\admin;

use app\models\AdminBase;
use app\models\admin\User;

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

    public $fail_info; //保存的错误信息

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

    /**
     * 编辑角色信息
     * @param  $data 接收到的角色信息
     * @return bool
     */
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

    /**
     * 角色信息的删除
     * @param  int $id 需要删除的角色id
     * @return bool    
     */
    public function deleteRole($id)
    {
        $model = $this->find()->where('role_id = :id', [':id' => $id])->one();
        if (!$model) {
            $this->fail_info = '不存在的角色信息';
            return false;
        }

        //判断是否存在用户是此角色，不能删除
        $user_model = User::find()->where('role_id = :id', [':id' => $id])->one();
        if ($user_model) {
            $this->fail_info = '存在用户在此角色下, 不能删除';
            return false;
        }

        $model->delete();
        return true;
    }


}
