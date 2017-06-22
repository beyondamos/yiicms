<?php
namespace app\models;

/**
 * 分类模型
 * @property integer $id 分类id
 * @property string $name 分类名称
 * @property string $alias 别名 在url中显示
 * @property integer $parent_id 父级分类id
 * @property string $introduction 简介
 */
class Category extends \app\models\AdminCommon{

    public static function tableName(){
        return 'category';
    }

    public function rules(){
        return [
            [['name', 'alias', 'parent_id'], 'required'],
            ['name', 'string', 'length' => [2,10]],
            ['alias', 'match', 'pattern' => '/^[a-zA-Z]+$/i'],
            ['parent_id', 'integer'],
            ['introduction', 'safe'],
            [['name', 'alias'], 'unique'],
        ];
    }

    public function attributeLabels(){
        return [
            'name' => '分类名称',
            'alias' => '分类别名',
            'parent_id' => '上级分类',
            'introduction' => '分类简介',
        ];
    }


}