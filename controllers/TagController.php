<?php
namespace app\controllers;

use app\controllers\HomeBaseController;
use app\models\Tags;
use Yii;
use app\models\Article;
use yii\data\Pagination;


/**
 * 标签控制器
 */
class TagController extends HomeBaseController
{
	/**
	 * 标签列表
	 * @return [type] [description]
	 */
	public function actionIndex()
	{
		$id = (int)Yii::$app->request->get('id');
		$tag = Tags::find()->where(['id' => $id])->one();
		$article_ids = explode(',', $tag->article_ids);

		$query = Article::find()->where(['id' => $article_ids]);
		$count = $query->count();
		$pagination = new Pagination(['pageSize' => 10, 'totalCount' => $count]);
		$articles = $query->offset($pagination->offset)->limit($pagination->limit)->all();
		foreach ($articles as $article) {
            $article->tagLists = $article->getTagsArray();
        }
		return $this->render('index', ['tag' => $tag, 'articles' => $articles, 'pagination' => $pagination]);

	}


	/**
	 * 在beforeAaction里实现 热门文章
	 * @param  [type] $action [description]
	 * @return [type]         [description]
	 */
	public function beforeAction($action)
	{
		parent::beforeAction($action);
		$this->showHotArticles();
		return true;
	}


}