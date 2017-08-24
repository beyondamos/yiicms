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
        $id = (int)Yii::$app->request->get('id');

        //大家都在看(栏目热门文章)
        $this->showCategoryHotArticles($id);

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
        //增加点击率
        $this->addHits($id);

        $article = Article::find()->where(['id' => $id])->one();

        //大家都在看(栏目热门文章)
        $this->showCategoryHotArticles($article->catid);

        //您可能感兴趣（获取与该文章相同标签的点记录较高的文章）
        $interestedArticles = $article->getInterestedArticles();
    
        $article->tagLists = $article->getTagsArray();

        return $this->render('detail', ['article' => $article, 'interestedArticles' => $interestedArticles]);
    }



    /**
     * 增加点击率
     * @param int $id 被访问的文章id
     * 1小时内访问算1个访问
     */
    private function addHits($id)
    {
        $time = time();
        //先获取cookies
        $cookies = Yii::$app->request->cookies;
        $hits = $cookies->getValue('hits', '');
        //判断是否有点击率的cookie
        if ($hits) {
            //存在cookie则处理过期的点击记录
            $hits_arr = unserialize($hits);
            foreach ($hits_arr as $key => $value) {
                if (($time-$value) > 3600) {
                    unset($hits_arr[$key]);
                }
            }
        } else {
            $hits_arr = [];
        }

        //如果cookies中不存在该id 或者 不存在cookie
        //重新保存cookies，并且数据库hits+1
        if (!array_key_exists($id, $hits_arr)) {
            $hits_arr[$id] = $time;
            $hits = serialize($hits_arr);
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                    'name' => 'hits',
                    'value' => $hits,
                    'expire' => time()+3600
                ]));
            $article = Article::find()->where('id = :id', [':id' => $id])->one();
            $article->hits = $article->hits+1;
            $article->save();
        }




    }


    /**
     * 获取某栏目下最热的6篇文章
     * @param  int $id 栏目id
     * @return array     文章数组
     */
    private function showCategoryHotArticles($id)
    {
        $articles = Article::find()->where(['catid' => $id])->orderBy('hits desc')->limit(6)->all();
        $view = Yii::$app->view;
        $view->params['categoryHotArticles'] = $articles;
    }




}
