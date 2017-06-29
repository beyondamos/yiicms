<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;
use app\models\admin\User;
use Yii;
use yii\data\Pagination;
use app\models\admin\Role;

/**
 * Class UserController  后台用户控制器
 * @package app\modules\admin\controllers
 */
class UserController extends AdminBaseController
{
    public $layout = false;
    /**
     * 用户列表
     */
    public function actionIndex()
    {
        $query = User::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 2]);
        $users = $query->limit($pagination->limit)->offset($pagination->offset)->with('role')->asArray()->all();
        $page = Yii::$app->request->get('page');
        return $this->render('index', ['users' => $users, 'pagination' => $pagination, 'page' => $page]);
    }

    /**
     * 用户添加
     */
    public function actionAdd()
    {
        $user_model = new User();
        //如果是添加用户
        if(Yii::$app->request->isPost){
            if ($user_model->addUser(Yii::$app->request->post())) {
                Yii::$app->session->setFlash('success');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('fail');
            }
        }
        //展示表单
        return $this->renderPartial('add',['model' => $user_model]);
    }

    public function actionEdit()
    {
        $id = Yii::$app->request->get('id');
        $page = Yii::$app->request->get('page');
        $model = User::find()->where('id = :id', [':id' => $id])->one();
        if (Yii::$app->request->isPost) {
            if ($model->editUser(Yii::$app->request->post())) {
                Yii::$app->session->setFlash('success', '编辑用户信息成功');
                return $this->redirect(['user/index', 'page' => $page]);
            } else {
                Yii::$app->session->setFlash('fail', '编辑用户信息失败');
            }

        }
        //获取角色信息
        $role = Role::getRoleBaseInfo();
        return $this->render('edit', ['model' => $model, 'role' => $role]);

    }


}
