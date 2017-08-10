<?php
namespace app\models;

/**
 * 分类模型
 * @property integer $id 分类id
 * @property string $name 分类名称
 * @property integer $parent_id 父级分类id
 * @property string $introduction 简介
 */
class Category extends \app\models\AdminBase
{

    public $failInfo = '';

    public static function tableName(){
        return 'category';
    }

    public function rules(){
        return [
            ['name', 'required', 'message' => '分类名称不能为空'],
            ['name', 'string', 'length' => [2,10], 'message' => '分类名称必须在2-10个字符之间'],
            ['name', 'unique', 'message' => '该分类名称已经存在'],
            ['parent_id', 'required', 'message' => '上级分类必须选择'],
            ['parent_id', 'integer', 'message' => '非法的上级分类'],
            ['introduction', 'safe'],
        ];
    }


    public function attributeLabels(){
        return [
            'name' => '分类名称',
            'parent_id' => '上级分类',
            'introduction' => '分类简介',
        ];
    }
    

    /**
     * 添加分类
     * @param array $data 分类数据
     */
    public function addCategory($data)
    {
        if ($this->load($data) && $this->validate()) {
            if ($this->save(false)) {
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * 编辑分类
     * @param  array $data 分类信息的数据
     * @return bool       编辑成功返回true 失败返回false
     */
    public function editCategory($data)
    {
        if ($this->load($data) && $this->validate()) {
            //判断下选择上级分类的时候，不能选择自身或者自身下子级分类
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
     * 在选择上级分类时，判断是否选择正确
     * 不能选择自身，也不能选择子级
     * @return bool
     */
    private function judgeParentId()
    {
        //判断是否选择自身
        if ($this->id == $this->parent_id) {
            $this->addError('parent_id', '上级分类不能选择自身');
            return false;
        }

        $categories = $this->_infiniteClass(self::find()->asArray()->all(), $this->id);
        if (!$categories) return true;
        foreach ($categories as $val) {
            if ($val['parent_id'] == $this->id) {
                $this->addError('parent_id', '上级分类不能选择自身的子级');
                return false;
            }
        }
        return true;
    }



    /**
     * 删除分类  存在子类不能删除
     * @return bool 删除成功返回true  失败返回false
     */
    public function deleteCategory()
    {
        //如果该分类下有子类不能删除
        $info = Self::find()->where('parent_id = :id', [':id' => $this->id])->one();
        if ($info) {
            $this->failInfo = '该分类下存在子类，不能删除!';
            return false;
        }
        if ($this->delete()) {
            return true;
        }
        return false;
    }

    /**
     * 获取分类信息
     * @return array 分类信息的二维数组
     */
    public function getSortCategory()
    {
        $result = $this->_infiniteClass($this->find()->orderBy('id asc')->asArray()->all());
        if ($result) {
            return $result;
        }
        return [];
    }


    /**
     * 下拉框的分类数据  供添加和编辑使用
     * @return array 分类信息的一维数组
     */
    public function getSelectCategory()
    {
        $data = $this->getSortCategory();
        $result[0] = '顶级分类';
        foreach ($data as $val) {
            $result[$val['id']] = str_repeat('----', $val['level']).$val['name'];
        }
        return $result;
    }


    /**
     * 无限级分类
     * @param  array $data 需要排序的二维数组
     * @param  int $pid    开始排序的父级id
     * @return array       排序好的数组
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

