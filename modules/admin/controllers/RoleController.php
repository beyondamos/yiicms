<?php
namespace app\modules\admin\controllers;

use app\models\admin\Role;
use app\modules\admin\controllers\AdminBaseController;
use app\models\admin\Auth;
use Yii;
use yii\data\Pagination;

/**
 * Class RoleController 角色控制器
 * @package app\modules\admin\controllers
 */
class RoleController extends AdminBaseController
{
    public $layout = false;

    /**
     * 角色列表
     */
    public function actionIndex()
    {
        $model = new Role();
        $role_data = $model->find()->asArray()->all();
        return $this->render('index', ['role_data' => $role_data]);
    }

    /**
     * 角色添加
     */
    public function actionAdd()
    {
        $model = new Role();
        if(Yii::$app->request->isPost){
            //添加角色
            if ($model->addRole(Yii::$app->request->post())) {
                //如果成功保存成功信息跳转到列表页
                Yii::$app->session->setFlash('success');
                return $this->redirect(['role/index']);
            } else {
                //如果失败 保存失败信息
                Yii::$app->session->setFlash('fail');
            }
        }

        $auth_model = new Auth();
        $auth_list = $auth_model->getSortAuth();
        return $this->render('add', ['model' => $model, 'auth_list' => $auth_list]);
    }
}
