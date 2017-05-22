<?php
namespace app\modules\admin\controllers;
use app\modules\admin\controllers\CommonController;
use app\models\User;
use Yii;

/**
 * Class UserController  后台用户控制器
 * @package app\modules\admin\controllers
 */
class UserController extends CommonController{
    /**
     * 用户列表
     */
    public function actionIndex(){
        return $this->renderPartial('index');
    }

    /**
     * 用户添加
     */
    public function actionAdd(){
        $user_model = new User();
        //接收数据成功
        if($user_model->load(Yii::$app->request->post()) && $user_model->addUser()){
            return $this->redirect(['user/index']);
        }
        //展示表单
        return $this->renderPartial('add',['model' => $user_model]);
    }




}