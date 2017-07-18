<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;
use Yii;
use app\models\Category;

class CategoryController extends AdminBaseController
{
    public $layout = false;

    public function actionIndex()
    {
        $category = new Category();
        $categories = $category->getSortCategory();
        return $this->render('index', ['categories' => $categories]);
    }

    /**
     * 分类添加
     */
    public function actionAdd()
    {
        $model = new Category();
        if (Yii::$app->request->isPost) {
            if ($model->addCategory(Yii::$app->request->post())) {
                Yii::$app->session->setFlash('success', '添加分类成功');
                return $this->redirect(['category/index']);
            }
            Yii::$app->session->setFlash('fail', '添加分类失败');
        }
        $category = $model->getSelectCategory();
        return $this->render('add', ['model' => $model, 'category' => $category]);
    }

    /**
     * 分类编辑
     */
    public function actionEdit()
    {
        $id = Yii::$app->request->get('id');
        $model = Category::find()->where('id = :id', [':id' => $id])->one();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->editCategory($data)) {
                Yii::$app->session->setFlash('success', '编辑分类成功');
                return $this->redirect(['category/index']);
            }
            Yii::$app->session->setFlash('fail', $model->failInfo);
        }

        $category = $model->getSelectCategory();
        return $this->render('edit', ['model' => $model, 'category' => $category]);
    }


    /**
     * 删除分类
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id');
        $model = Category::find()->where('id = :id', [':id' => $id])->one();
        if ($model->deleteCategory()) {
            Yii::$app->session->setFlash('success', '删除分类成功');
        } else {
            Yii::$app->session->setFlash('fail', $model->failInfo);
        }
        return $this->redirect(['category/index']);
    }

}
