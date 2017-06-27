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


    public function actionEdit()
    {
        $role_id = Yii::$app->request->get('role_id');
        $model = Role::find()->where('role_id = :id', [':id' => $role_id])->one();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->editRole($data)) {
                //如果成功保存跳转列表页
                Yii::$app->session->setFlash('success', '角色信息编辑成功');
                return $this->redirect(['role/index']);
            } else {
                //如果失败 保存失败信息
                Yii::$app->session->setFlash('fail', '角色信息编辑失败');
            }
        }

        $auth_model = new Auth();
        $auth_list = $auth_model->getSortAuth();
        //把角色权限列表转换成数组
        $model->role_auth = explode(',', $model->role_auth);
        return $this->render('edit', ['model' => $model, 'auth_list' => $auth_list]);
    }

    public function actionDelete()
    {
        $role_id = Yii::$app->request->get('role_id');
        //角色id为1的是管理员，不允许删除
        if ($role_id == 1) {
            Yii::$app->session->setFlash('fail', '管理员角色不允许删除');
            return $this->redirect(['role/index']);
        }
        $model = new Role();
        if ($model->deleteRole($role_id)) {
            Yii::$app->session->setFlash('success', '删除角色信息成功');
            return $this->redirect(['role/index']);
        } else {
            Yii::$app->session->setFlash('fail', $model->fail_info);
            return $this->redirect(['role/index']);
        }

    }



}
