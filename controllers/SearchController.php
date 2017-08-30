<?php
namespace app\controllers;

use app\controllers\HomeBaseController;
use Yii;
use app\models\Article;
use yii\data\Pagination;

/**
 * 搜索控制器
 */
class SearchController extends HomeBaseController
{

	public $enableCsrfValidation = false;

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function actionIndex()
	{
		
		$keyword = trim(Yii::$app->request->post('keyword'));
		if (empty($keyword)) {
			return $this->redirect(['index/index']);
		}

		//推荐信息
		$this->showRecommendArticles();

		$query = Article::find()->where(['like', 'title', $keyword]);
		$count = $query->count();
		$pagination = new Pagination(['pageSize' => 20, 'totalCount' => $count]);
		$articles = $query->offset($pagination->offset)->limit($pagination->limit)->all();
		//带上文章的标签信息
		foreach ($articles as $article) {
            $article->tagLists = $article->getTagsArray();
        }
		return $this->render('index', ['articles' => $articles, 'pagination' => $pagination, 'keyword' => $keyword]);

	}

}