<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;

/**
 * 后台导航控制器
 */
class NavController extends AdminBaseController
{
	public $layout = false;

	/**
	 * 导航列表信息
	 * @return [type] [description]
	 */
	public function actionIndex()
	{
		return $this->render('index');
	}





}
