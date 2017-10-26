<?php
namespace app\models;

use app\models\AdminBase;
use app\models\Category;
use app\models\Tags;

/**
 * 文章模型
 */
class Article extends AdminBase
{
    public $tags;
    public $file_upload;
    public $tagLists; //该篇文章的标签的数组

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
            ['thumbnail', 'safe'],
            [['tags', 'status', 'abstract', 'recommend', 'top', 'carousel'], 'safe']
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['add'] = ['title', 'catid', 'text', 'author', 'status', 'recommend','top' ,'carousel'];
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
     * 关联分类表 获取分类名称
     * @return [type] [description]
     */
    public function getCatename()
    {
        return $this->hasOne(Category::className(), ['id' => 'catid']);
    }

    /**
     * 获取标签名称列表
     * @return array 标签名称列表
     */
    public function getTags()
    {
        $tag_ids = $this->tag_ids;
        $tag_ids = explode(',', $tag_ids);
        $Tags = new Tags();
        $tags_arr = $Tags->find()->select(['tag_name'])->where(['id' => $tag_ids])->asArray()->all();
        $tags = [];
        foreach ($tags_arr as $tag) {
            $tags[] = $tag['tag_name'];
        }
        return $tags;
    }


    public function getTagsArray()
    {
        $tag_ids = $this->tag_ids;
        $tag_ids = explode(',', $tag_ids);
        $Tags = new Tags();
        return $tags_arr = $Tags->find()->where(['id' => $tag_ids])->asArray()->all();
    }


    /**
     * 添加文章
     * @param array $data 需要添加文章的信息
     */
    public function addArticle($data)
    {
        if ($this->load($data) && $this->validate()) {
            $this->createtime = time();
            $this->updatetime = time();
            if ($this->save(false)) {
                $this->dealTags();
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * 编辑文章
     * @param  array $data 需要更改的文章内容
     * @return bool       
     */
    public function editArticle($data)
    {
        if ($this->load($data) && $this->validate()) {
            $this->updatetime = time();
            if ($this->save(false)) {
                $this->dealTags();
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * 在文章save之后处理tags信息
     * @return [type] [description]
     */
    public function dealTags()
    {
        $tags = new Tags();
        $tags->new_tags = $this->tags;
        $tags->article_id = $this->id;
        $tags->old_tags = $this->getTags();
        $tag_ids = $tags->dealTags();
        $this->tag_ids = implode(',', $tag_ids);
        $this->save();
    }



    public function uploadImage()
    {
        $save_url = '/uploads/pictures/';
        $save_url .=  date('Ym',time()).'/';
        $save_path = $_SERVER['DOCUMENT_ROOT'] . $save_url;
        //PHP上传失败
        if (!empty($_FILES['Filedata']['error'])) {
            switch($_FILES['Filedata']['error']){
                case '1':
                    $error = '超过php.ini允许的大小。';
                    break;
                case '2':
                    $error = '超过表单允许的大小。';
                    break;
                case '3':
                    $error = '图片只有部分被上传。';
                    break;
                case '4':
                    $error = '请选择图片。';
                    break;
                case '6':
                    $error = '找不到临时目录。';
                    break;
                case '7':
                    $error = '写文件到硬盘出错。';
                    break;
                case '8':
                    $error = 'File upload stopped by extension。';
                    break;
                case '999':
                default:
                    $error = '未知错误。';
            }
            echo $error;
        }

        $tmp_name = $_FILES['Filedata']['tmp_name'];

        //获得文件扩展名
        $temp_arr = explode(".", $_FILES['Filedata']['name']);
        $file_ext = array_pop($temp_arr);
        $file_ext = trim($file_ext);
        $file_ext = strtolower($file_ext);
        $ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
        //检查扩展名
        if (in_array($file_ext, $ext_arr) === false) {
            echo "上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $ext_arr) . "格式。";
        }
        //创建文件夹

        if (!file_exists($save_path)) {
            mkdir($save_path);
        }
        
        //新文件名
        $new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
        //移动文件
        $file_path = $save_path . $new_file_name;
        if (move_uploaded_file($tmp_name, $file_path) === false) {
            echo '上传文件失败';
            return false;
        } else {
            return $save_url.$new_file_name;
        }

    }

    /**
     * 删除图片  （当编辑文章上传新图片时）
     * @param  string $image 旧图片
     * @return [type]        [description]
     */
    public function deleteImage($image)
    {
        $file = WEB_ROOT.$image;
        if (is_file($file)) {
            unlink($file);
        }
        
    }



    public function getInterestedArticles()
    {
        $tag_ids = $this->tag_ids;
        $ids = explode(',', $tag_ids);
        if (count($ids) == 0 ) {
            return [];
        }

        //将多个标签下的文章id合并
        $Tag = Tags::find()->where(['id' => $ids])->all();
        $article_ids = [];
        foreach ($Tag as $tag) {
            $article_ids = array_merge($article_ids, explode(',', $tag->article_ids));
        }

        //去掉重复的文章id
        $article_ids = array_unique($article_ids);
        //去掉自身的id
        foreach ($article_ids as $key => $val) {
            if ($val == $this->id) {
                unset($article_ids[$key]);
            }
        }

        return $this->find()->where(['id' => $article_ids])->orderBy('hits desc')->limit(10)->all();
    }


}
