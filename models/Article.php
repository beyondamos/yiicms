<?php
namespace app\models;

use app\models\AdminBase;

/**
 * 文章模型
 */
class Article extends AdminBase
{
    public $tags;

    public static function tableName()
    {
        return 'article';
    }

    public function rules()
    {
        return [
            ['title', 'required', 'message' => '标题不能为空'],
            ['catid', 'integer', 'min' => 1, 'message' => '必须选择文章分类'],
            ['text', 'required', 'message' => '正文不能为空'],
            ['author', 'required', 'message' => '作者不能为空'],
            ['status', 'integer'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['add'] = ['title', 'catid', 'text', 'author', 'status'];
        return $scenarios;
    }


    public function attributeLabels()
    {
        return [
            'title' => '标题',
            'catid' => '文章分类',
            'thumbnail' => '缩略图',
            'keywords' => '关键词',
            'abstract' => '简介',
            'text' => '正文',
            'author' => '作者',
            'property' => '信息属性',
            'tags' => '标签',

        ];
    }

    /**
     * 添加文章
     * @param array $data 需要添加文章的信息
     */
    public function addArticle($data)
    {
        if ($this->load($data) && $this->validate()) {
            $this->createtime = time();
            if ($this->save(false)) {
                return true;
            }
            return false;
        }
        return false;
    }


}
