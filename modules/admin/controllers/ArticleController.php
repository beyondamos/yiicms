<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;
use Yii;
use app\models\Article;
use app\models\Category;
use yii\data\Pagination;

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
        $query = Article::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 30]);
        $articles = $query->offset($pagination->offset)->limit($pagination->limit)->with('catename')->orderBy('id desc')->asArray()->all();
        return $this->render('index', ['articles' => $articles, 'pagination' => $pagination]);
    }

    /**
     * 未审核列表
     */
    public function actionUnaudited(){
        return $this->render('unaudited');
    }


    /**
     * 文章添加
     */
    public function actionAdd()
    {
        $model = new Article();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->addArticle($data)) {
                Yii::$app->session->setFlash('success', '添加文章成功');
                return $this->redirect(['article/index']);
            } else {
                Yii::$app->session->setFlash('fail', '添加文章失败');
            }
        } 

        $category = new Category();
        $categories = $category->getSelectCategory();
        return $this->render('add',['model' => $model, 'category' => $categories]);
        
    }

    /**
     * 文章编辑
     * @return [type] [description]
     */
    public function actionEdit()
    {
        $id = Yii::$app->request->get('id');
        $model = Article::find()->where('id = :id', [':id' => $id])->one();
        $oldImage = $model->thumbnail;
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $newImage = $data['Article']['thumbnail'];
            if ($model->editArticle($data)) {
                Yii::$app->session->setFlash('success', '编辑文章成功');
                if ($oldImage != $newImage) {
                    $model->deleteImage($oldImage);
                }
                return $this->redirect(['article/index']);
            }
            Yii::$app->session->setFlash('fail', '编辑文章失败');
        }

        $category = new Category();
        $categories = $category->getSelectCategory();
        return $this->render('edit',['model' => $model, 'category' => $categories]);
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




}
