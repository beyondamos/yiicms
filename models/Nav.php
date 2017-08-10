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
            ['sort', 'integer', 'min' => 1, 'max' => 100, 'message' => '排序数字必须为0-100的整数'],
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
            'status' => '导航状态',
            'sort' => '排序'
        ];
    }


    /**
     * 编辑导航信息
     * @param  array $data post提交的编辑信息
     * @return bool       [description]
     */
    public function editNav($data)
    {
    
        if ($this->load($data) && $this->validate()) {
            //如果选择的上级导航是自身或其子类或者子孙类，则不能保存成功
            if (!$this->judgeParentId()) {
                return false;
            }

            if ($this->save(false)) {
                return true;
            }
            return false;
        }
        return false;
    }


    /**
     * 删除导航
     * 如果该导航下存在子级，则不能删除
     * @return bool 
     */
    public function delNav()
    {
        $nav = Nav::find()->where(['parent_id' => $this->id ])->one();
        if ($nav) {
            return false;
        }
        if ($this->delete()) {
            return true;
        }
        return false;
    }






    /**
     * 判断当前实例的新选择的parent_id 是否是原来的子级或子孙级
     * @return [type] [description]
     */
    private function judgeParentId()
    {
        //判断是否上级导航是否选择了自身
        if ($this->parent_id == $this->id) {
            $this->addError('parent_id', '上级导航不得选择自身');
            return false;
        }

        //判断上级导航是否为子孙级
        //先获取旧属性parnet_id 下的子级或子孙级列表
        $result = $this->_infiniteClass($this->find()->orderBy('sort asc')->asArray()->all(), $this->id);
        if (!$result) $result = [];
        foreach ($result as $val) {
            if ($val['id'] == $this->parent_id) {
                $this->addError('parent_id', '上级导航不能选择其子孙级');
                return false;
            }
        }
        return true;
    }







    /**
     * 获取排序好的导航列表
     * @return array 排序好的导航列表
     */
    public function getSortNavs()
    {
        $result = $this->_infiniteClass($this->find()->orderBy('sort asc')->asArray()->all());
        if ($result) {
            return $result;
        }
        return [];
    }


    /**
     * 获取在下拉框中可以使用的导航列表数据格式，供添加和编辑时选择使用
     * @return array [description]
     */
    public function getSelectNavs()
    {
        $result[0] = '一级导航';
        $data = $this->getSortNavs();
        foreach ($data as $val) {
            $result[$val['id']] = str_repeat('----', $val['level']).$val['nav_name'];
        }
        return $result;
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
