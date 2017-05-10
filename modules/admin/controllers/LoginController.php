<?php
namespace app\modules\admin\controllers;
use app\modules\admin\controllers\CommonController;

/**
 * 后台登录控制器
 * @package app\modules\admin\controllers
 */
class LoginController extends CommonController{
    /**
     * 登录
     */
    public function actionIndex(){
        return $this->renderPartial('index');
    }


}