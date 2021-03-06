<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;
use Yii;
use app\models\Article;
use app\models\Category;
use yii\data\Pagination;
use app\models\Tags;
use app\models\admin\User;

/**
 * 后台文章控制器
 */
class ArticleController extends AdminBaseController
{
    public $layout = false;

    /**
     * 文章列表
     */
    public function actionIndex()
    {
        $searchInfo = Yii::$app->request->get();
        $query = Article::find()->where(['status' => 1]);

        if (isset($searchInfo['cateId'])) {
            $cateId = $searchInfo['cateId'];
            if ($cateId > 0) {
                $query->andWhere(['catid' => $cateId]);
            }
        }
        if (isset($searchInfo['title'])) {
            $searchTitle = $searchInfo['title'];
            $query->andWhere(['like', 'title', $searchTitle]);
        }

        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 20]);
        $articles = $query->offset($pagination->offset)->limit($pagination->limit)
                            ->with('catename')->orderBy('id desc')->all();
        $Articles = [];
        foreach ($articles as $article) {
            $article->tags = implode(',', $article->getTags());
            $Articles[] = $article;
        }                    

        $category = new Category();
        $categories = $category->getSelectCategory();
        
        return $this->render('index', ['articles' => $Articles, 
                                    'pagination' => $pagination,
                                    'categories' => $categories,
                                    'searchTitle' => isset($searchTitle) ? $searchTitle : '',
                                    'cateId' => isset($cateId) ? $cateId : '0'
                                    ]);
    }

    /**
     * 回收站列表
     */
    public function actionDrafts(){
        $query = Article::find()->where(['status' => 0]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 25]);
        $articles = $query->offset($pagination->offset)->limit($pagination->limit)
                        ->with('catename')->orderBy('id desc')->all();
        $Articles = [];
        foreach ($articles as $article) {
            
            $article->tags = implode(',', $article->getTags());
            $Articles[] = $article;
        }      

        return $this->render('drafts', ['articles' => $Articles, 'pagination' => $pagination]);

    }


    /**
     * 文章添加
     */
    public function actionAdd()
    {
        $model = new Article();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $data = $this->dealCheckbox($data);
            if ($model->addArticle($data)) {
                Yii::$app->session->setFlash('success', '添加文章成功');
                return $this->redirect(['article/index']);
            } else {
                Yii::$app->session->setFlash('fail', '添加文章失败');
            }
        }
        $category = new Category();
        $categories = $category->getSelectCategory();
        // 传入作者的默认值
        return $this->render('add',['model' => $model, 'category' => $categories, 'author' => User::getNickname($this->user_id)]);
        
    }

    /**
     * 文章编辑
     * @return [type] [description]
     */
    public function actionEdit()
    {

        $id = Yii::$app->request->get('id');
        $model = Article::find()->where('id = :id', [':id' => $id])->one();
        $oldImage = $model->thumbnail;  //文章原来的旧图  用来和新图做比较，判断是否上传了新图片
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $data = $this->dealCheckbox($data);
            $newImage = $data['Article']['thumbnail'];
            if ($model->editArticle($data)) {
                Yii::$app->session->setFlash('success', '编辑文章成功');
                if ($oldImage != $newImage) {
                    $model->deleteImage($oldImage);
                }
                return $this->goBack();
            }
            Yii::$app->session->setFlash('fail', '编辑文章失败');
        }
        Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
        $model->tags = implode(',', $model->getTags()); //展示文章的标签列表
        $category = new Category();
        $categories = $category->getSelectCategory();
        return $this->render('edit',['model' => $model, 'category' => $categories]);
    }


    /**
     * 审核文章，审核的进入草稿箱，草稿箱的进入审核
     * @return [type] [description]
     */
    public function actionExamine()
    {
        $id = Yii::$app->request->get('id');
        $model = Article::find()->where(['id' => $id])->one();
        if ($model->status == 1) {
            $model->status = 0;
        } else {
            $model->status = 1 ;
        }

        if ($model->save()) {
            Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
            return $this->goBack();
        }

    }

    /**
     * 删除文章 同时删除图片和处理Tag标记
     * @return [type] [description]
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id');
        $model = Article::find()->where(['id' => $id])->one();

        //处理标签
        //获取该记录的标签列表
        $tags_arr = $model->getTags();
        $Tag = new Tags();
        $Tag->del_tags = $tags_arr; //传入要处理的标签列表
        $Tag->article_id = $id; //传入要处理的文章id
        $Tag->delTagRecord();

        //处理标题图片
        if ($model->thumbnail) {
            $model->deleteImage($model->thumbnail);
        }

        $model->delete();
        Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
        return $this->goBack();

    }




    /**
     * ajax上传图片
     * @return [type] [description]
     */
    public function actionUploadimage()
    {
        $verifyToken = md5('unique_salt' . $_POST['timestamp']);
        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
            $model = new Article();
            if ($file_url = $model->uploadImage()) {
                echo $file_url;
            } else {
                echo 2;
            }

        }
    }


    /**
     * 处理checkbox的值   审核 头条 首页轮播 推荐
     * @param  array $data post提交的值
     * @return array $data  处理后的数据
     */
    private function dealCheckbox($data)
    {
        if (array_key_exists('status', $data['Article']) && $data['Article']['status'] == 'on') {
            $data['Article']['status'] = 1;
        } else {
            $data['Article']['status'] = 0;
        }

        if (array_key_exists('top', $data['Article']) && $data['Article']['top'] == 'on') {
            $data['Article']['top'] = 1;
        } else {
            $data['Article']['top'] = 0;
        }

        if (array_key_exists('carousel', $data['Article']) && $data['Article']['carousel'] == 'on') {
            $data['Article']['carousel'] = 1;
        } else {
            $data['Article']['carousel'] = 0;
        }

        if (array_key_exists('recommend', $data['Article']) && $data['Article']['recommend'] == 'on') {
            $data['Article']['recommend'] = 1;
        } else {
            $data['Article']['recommend'] = 0;
        }
        return $data;
    }

}
