<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;
use app\models\admin\User;
use Yii;

/**
 * Class UserController  后台用户控制器
 * @package app\modules\admin\controllers
 */
class UserController extends AdminBaseController
{
    /**
     * 用户列表
     */
    public function actionIndex()
    {
        return $this->renderPartial('index');
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




}
