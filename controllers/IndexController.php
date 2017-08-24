<?php
namespace app\controllers;

use app\controllers\HomeBaseController;
use Yii;
use app\models\Article;
use yii\data\Pagination;

class IndexController extends HomeBaseController
{

    public function actionIndex()
    {

        //最新资讯
        $query = Article::find()->where(['status' => 1]);
        $count = $query->count();
        $pagination = new Pagination(['pageSize' => 10, 'totalCount' => $count]);
        $articles = $query->limit($pagination->limit)->offset($pagination->offset)
                        ->with('catename')->orderBy('id desc')->all();
        foreach ($articles as $article) {
            $article->tagLists = $article->getTagsArray();
        }
        
        return $this->render('index', ['articles' => $articles, 'pagination' => $pagination]);
    }

}

