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
        $model = new Nav();
        $navs = $model->getSortNavs();

		return $this->render('index', ['navs' => $navs]);
	}


    /**
     * 导航添加
     * @return [type] [description]
     */
    public function actionAdd()
    {
        $model = new Nav();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->load($data) && $model->save()) {
                Yii::$app->session->setFlash('success', '添加导航信息成功');
                return $this->redirect(['nav/index']);
            } 
            Yii::$app->session->setFlash('fail', '添加导航信息失败');
        }

        return $this->render('add', ['model' => $model, 'navs' => $model->getSelectNavs() ]);
    }


    /**
     * 导航编辑
     * @return [type] [description]
     */
    public function actionEdit()
    {
        $id = Yii::$app->request->get('id');
        $nav = Nav::find()->where('id = :id', ['id' => $id])->one();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($nav->editNav($data)) {
                Yii::$app->session->setFlash('success', '编辑导航信息成功');
                return $this->redirect(['nav/index']);
            }
            Yii::$app->session->setFlash('fail', '编辑导航信息失败');
        }
        return $this->render('edit', ['model' => $nav, 'navs' => $nav->getSelectNavs()]);
    }



}
