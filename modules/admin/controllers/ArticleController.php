<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;
use Yii;
use app\models\Article;
use app\models\Category;

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
        return $this->render('index');
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
}
