<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\Nav;
use Yii;
use app\models\Article;
use app\models\Tags;
use app\models\admin\Accesslog;

/**
 * @package app\controllers
 * 前台公共控制器
 */
class HomeBaseController extends Controller
{
	public $catid = 0;
	public $islogin = 0;
	public $member_id = null;

	/**
	 * 初始化
	 * @return [type] [description]
	 */
	public function init() 
	{
		//统计流量
		$this->flow();

		//导航
		$this->showNavs();

		//热门文章
		$this->showHotArticles();

		//热门话题
		$this->showHotTags();

		//判断是否登录
		$this->isLogin();


	}


	/**
	 * 展示导航
	 * @return [type] [description]
	 */
	public function showNavs()
	{
		$models = Nav::find()->where(['status' => 1, 'parent_id' => 0])->orderBy('sort asc')->asArray()->all();
		$view = Yii::$app->view;
		$view->params['navs'] = $models;
	}


	/**
	 * 展示热门文章排行
	 * @return [type] [description]
	 */
	public function showHotArticles()
	{
		$model = new Article();
		$articles = $model->find()->where(['status' => 1])->orderBy('hits desc')->limit(10)->all();

		$view = Yii::$app->view;
		$view->params['hotArticles'] = $articles;
	}


	/**
	 * 展示热门的话题（标签）
	 * @return [type] [description]
	 */
	public function showHotTags()
	{
		$tags = Tags::find()->orderBy('count desc')->limit(10)->all();
		$view = Yii::$app->view;
		$view->params['hotTags'] = $tags;
	}


	/**
	 * 展示推荐文章（不适用于文章列表和文章详情页面）
     * @param  int $catid 栏目catid
	 */
	public function showRecommendArticles($catid = 0)
	{
		$where = ['recommend' => 1, 'status' => 1];
		if ($catid != 0) {
			$where['catid'] = $catid;
		}
		$articles = Article::find()->where($where)->orderBy('updatetime desc')->limit(10)->all();
		$view = Yii::$app->view;
		$view->params['recommendArticles'] = $articles;
	}


	/**
	 * 统计流量
	 * @return [type] [description]
	 */
	private function flow() {
		$request = Yii::$app->request;
		$time = time();
        $ip = $request->getUserIp();
        $accesslog = new Accesslog();
        $accesslog->ip = ip2long($ip);
        $accesslog->url = $request->getUrl();
        $accesslog->visittime = $time;
        $accesslog->referrer = !empty($request->getReferrer()) ? $request->getReferrer() : 'Browser Input';
        $accesslog->useragent = $request->getUserAgent();
        $accesslog->year = date('Y', $time);
        $accesslog->month = date('m', $time);
        $accesslog->day = date('d', $time);
        $accesslog->save(false);
        
	}


	/**
	 * 判断是否登录
	 * @return boolean [description]
	 */
	public function isLogin() {
		$session = Yii::$app->session;
		if ( $memberinfo = $session->get('memberinfo')) {
			$this->islogin = 1;
			$this->member_id = $memberinfo['memberid'];
		} else {
			$this->islogin = 0;
		}
		Yii::$app->view->params['islogin'] = $this->islogin;
	}



}

