<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;
use app\models\admin\User;
use Yii;
use yii\data\Pagination;

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
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 10]);
        $users = $query->limit($pagination->limit)->offset($pagination->offset)->with('role')->asArray()->all();
        return $this->render('index', ['users' => $users, 'pagination' => $pagination]);
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
        $model = User::find()->where('id = :id', [':id' => $id])->one();

    }


}
