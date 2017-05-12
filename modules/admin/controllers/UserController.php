<?php
namespace app\modules\admin\controllers;
use app\modules\admin\controllers\CommonController;

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
        return $this->renderPartial('add');
    }




}