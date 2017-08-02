<?php
namespace app\controllers;

use app\controllers\HomeBaseController;
use Yii;
use app\models\Article;

/**
 * Class ArticleController
 * @package app\controllers
 * 前台文章控制器
 */

class ArticleController extends HomeBaseController
{

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionDetail()
    {
        $id = Yii::$app->request->get('id');
        $article = Article::find()->where(['id' => $id])->one();
        $article->tagLists = $article->getTagsArray();
        return $this->render('detail', ['article' => $article]);
    }


}
