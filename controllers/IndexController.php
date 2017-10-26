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
        //轮播图信息
        $carousels = Article::find()->select(['id','title','thumbnail'])->where(['status' => 1, 'carousel' => 1])->limit(3)->orderBy('createtime desc')->asArray()->all();
        //头条信息
        $tops = Article::find()->select(['id','title', 'abstract'])->where(['status' => 1, 'top' => 1])->limit(3)->orderBy('createtime desc')->asArray()->all();


        //最新资讯
        $query = Article::find()->where(['status' => 1]);
        $count = $query->count();
        $pagination = new Pagination(['pageSize' => 10, 'totalCount' => $count]);
        $articles = $query->limit($pagination->limit)->offset($pagination->offset)
                        ->with('catename')->orderBy('id desc')->all();
        foreach ($articles as $article) {
            $article->tagLists = $article->getTagsArray();
        }
        
        //置顶推荐
        $this->showRecommendArticles();

        return $this->render('index', ['carousels' => $carousels, 'tops' => $tops, 'articles' => $articles, 'pagination' => $pagination]);
    }

}

