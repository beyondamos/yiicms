<?php
namespace app\models;

use app\models\AdminBase;

class Nav extends AdminBase
{
    public static function tableName()
    {
        return 'nav';
    }


    public function rules()
    {
        return [
            ['nav_name', 'required', 'message' => '导航名称不能为空']
        ];
    }


    public function attributeLabels()
    {
        return [
            'nav_name' => '导航名称',
            'parent_id' => '上级导航',
            'position' => '导航位置',
            'nav_url' => '导航地址',
            'status' => '导航状态'
        ];
    }


    /**
     * 添加导航
     * @param array $data post接收到的导航信息
     */
    public function addNav($data)
    {
        if ($this->load($data) &&　$this->validate()) {
            if ($this->save(false)) {
                return true;
            }
            return false;
        }
        return false;
    }


}
