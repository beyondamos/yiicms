<?php
namespace app\models;

use app\models\AdminBase;

class Tags extends AdminBase
{
    public $new_tags = null;    //新的标签列表，数据提交得到的
    public $old_tags = null;    //旧的标签列表，原来文章数据表中的(若为新增文章，则空)
    public $article_id = null;  //正要编辑的文章id
    private $add_tags = null;    //需要新增的标签列表
    private $del_tags = null;    //需要删除的标签列表


    public static function tableName()
    {
        return 'tags';
    }


    /**
     * 处理该文章的标签
     * @return array 该文章的标签id列表数组
     */
    public function dealTags()
    {
        $this->getAllTagsArray();

        //新增标签记录
        if (!empty($this->add_tags)) {
            $this->addTagRecord();
        }

        if (!empty($this->del_tags)) {
            $this->delTagRecord();
        }

        //获得新标签列表的id列表数组
        return $this->getTagsId($this->new_tags);

    }


    /**
     * 获取
     * @param  [type] $tags [description]
     * @return [type]       [description]
     */
    private function getTagsId($tags)
    {
        $tag_ids = [];
        foreach ($tags as $tag) {
            $tag_model = Tags::find()->select(['id'])->where(['tag_name' => $tag])->one();
            $tag_ids[] = $tag_model->id;
        }
        return $tag_ids;
    }


    /**
     * 添加标签记录
     */
    private function addTagRecord()
    {

        foreach ($this->add_tags as $k => $tag) {

            $tag_model = $this->findOne(['tag_name' => $tag]);
            //存在就更新article_ids
            if ($tag_model) {
                $article_ids = explode(',', $tag_model->article_ids);
                $article_ids[] = $this->article_id;
                $tag_model->article_ids = implode(',', $article_ids);
                $tag_model->save();
            } else {
                //不存在就添加tag记录
                $tag_model = new Tags();
                $tag_model->tag_name = $tag;
                $tag_model->article_ids = $this->article_id;
                $tag_model->save();
            }
        }

    }


    /**
     * 删除标签记录
     * @return [type] [description]
     */
    private function delTagRecord()
    {
        foreach ($this->del_tags as $tag) {
            $tag_model = $this->findOne(['tag_name' => $tag]);
            $article_ids = explode(',', $tag_model->article_ids);
            foreach ($article_ids as $key => $val) {
                if ($val == $this->article_id) {
                    unset($article_ids[$key]);
                }
            }

            //判断$article_ids 是否大于0，如果等于0，则把整条标签记录直接删除
            if (count($article_ids) > 0) {
                $article_ids = implode(',', $article_ids);
                $tag_model->article_ids = $article_ids;
                $tag_model->save(false);
            } else {
                $tag_model->delete();
            }

        }

    }


    /**
     * 整理所有的标签数组：新标签列表,旧标签列表,要添加的标签列表,删除的标签列表
     * @return [type] [description]
     */
    private function getAllTagsArray()
    {


        $this->new_tags = $this->dealTagsArray($this->new_tags);

        $this->add_tags = array_diff($this->new_tags, $this->old_tags);
        $this->del_tags = array_diff($this->old_tags, $this->new_tags);

    }


    /**
     * 整理标签列表成标准的格式
     * @param  array $tags 待整理的标签数组
     * @return array       整理完毕的标签数组
     */
    private function dealTagsArray($tags)
    {
        //整理新标签列表
        if (!empty($tags)) {
            $tags = trim($tags);
            $tags = trim($tags,',');
            if (empty($tags)) {
                return [];
            }
            $tags = explode(',', $tags);
            $tags = array_filter($tags);
            return array_unique($tags);
        } else {
            return [];
        }
    }


}

