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
            ['nav_name', 'required', 'message' => '导航名称不能为空'],
            ['nav_name', 'string', 'length' => [1,32], 'message' => '导航名称长度不能超过32个字符'],
            ['parent_id', 'required', 'message' => '上级导航必须选择'],
            ['parent_id', 'integer', 'min' => 0],
            ['nav_url', 'required', 'message' => '导航地址不能为空'],
            ['nav_url', 'url', 'message' => '无效的导航地址'],
            [['is_blank', 'status'], 'in', 'range' => [0,1]],
        ];
    }


    public function attributeLabels()
    {
        return [
            'nav_name' => '导航名称',
            'parent_id' => '上级导航',
            'is_blank' => '是否新窗口打开',
            'nav_url' => '导航地址',
            'status' => '导航状态'
        ];
    }


    /**
     * 获取排序好的导航列表
     * @return array 排序好的导航列表
     */
    public function getSortNavs()
    {
        return $this->_infiniteClass($this->find()->orderBy('id asc')->asArray()->all());
    }


    /**
     * 获取在下拉框中可以使用的导航列表数据格式，供添加和编辑时选择使用
     * @return array [description]
     */
    public function getSelectNavs()
    {
        $result[0] = '一级导航';
         
    }



    /**
     * 无限极分类
     * @param  array  $data  需要排序的数组
     * @param  integer $pid  从父级id为$pid开始排序
     * @param  integer $level 层级深度
     * @return array         排好序的数组
     */
    private function _infiniteClass($data, $pid = 0, $level = 0)
    {
        static $result;
        foreach ($data as $val) {
            if ($val['parent_id'] == $pid) {
                $val['level'] = $level;
                $result[] = $val;
                $this->_infiniteClass($data, $val['id'], $level+1);
            }
        }
        return $result;
    }

}
