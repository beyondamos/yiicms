<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;
use Yii;
use app\models\Nav;

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

		return $this->render('index', ['navs' => []]);
	}


    /**
     * 导航添加
     * @return [type] [description]
     */
    public function actionAdd()
    {
        $model = new Nav();
        // var_dump($model);
        // exit;
        // // if (Yii::$app->request->isPost) {
        // //     $data = Yii::$app->request->post();
        // //     if ($model->addNav($data)) {
        // //         Yii::$app->session->setFlash('success', '添加导航信息成功');
        // //         return $this->redirect(['nav/index']);
        // //     } 
        // //     Yii::$app->session->setFlash('fail', '添加导航信息失败');
        // // }

        return $this->render('add', ['model' => $model, 'navs' => []]);
    }


}
