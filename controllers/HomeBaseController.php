<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\Nav;
use Yii;

/**
 * @package app\controllers
 * 前台公共控制器
 */
class HomeBaseController extends Controller
{
	/**
	 * 初始化
	 * @return [type] [description]
	 */
	public function init() 
	{
		$this->showNavs();
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


}

