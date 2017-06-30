<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;
use Yii;
use app\models\Article;

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
        return $this->renderPartial('unaudited');
    }


    /**
     * 文章添加
     */
    public function actionAdd()
    {
        $model = new Article();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        } else {
            return $this->renderPartial('add',['model' => $model]);
        }
    }
}
