<?php
namespace app\controllers;

use app\controllers\HomeBaseController;
use Yii;
use app\models\Article;
use yii\data\Pagination;
use app\models\Category;

/**
 * Class ArticleController
 * @package app\controllers
 * 前台文章控制器
 */

class ArticleController extends HomeBaseController
{

    /**
     * 文章栏目列表页
     * @return [type] [description]
     */
    public function actionIndex(){
        $id = Yii::$app->request->get('id');
        $category = Category::find()->where(['id' => $id])->one();
        $query = Article::find()->where(['status' => 1, 'catid' => $id]);
        $count = $query->count();
        $pagination = new Pagination(['pageSize' => 10, 'totalCount' => $count]);
        $articles = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        foreach ($articles as $article) {
            $article->tagLists = $article->getTagsArray();
        }
        return $this->render('index', ['articles' => $articles, 'category' => $category, 'pagination' => $pagination]);
    }

    /**
     * 文章内容页
     * @return [type] [description]
     */
    public function actionDetail()
    {
        $id = Yii::$app->request->get('id');
        $article = Article::find()->where(['id' => $id])->one();
        $article->tagLists = $article->getTagsArray();
        return $this->render('detail', ['article' => $article]);
    }



    /**
     * 增加点击率
     * @param int $id 被访问的文章id
     * 1小时内访问算1个访问
     */
    private function addHits($id)
    {
        
    }






}
