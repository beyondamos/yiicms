<?php
namespace app\modules\admin\controllers;
use app\modules\admin\controllers\CommonController;

/**
 * Class RoleController 角色控制器
 * @package app\modules\admin\controllers
 */
class RoleController extends CommonController{
    /**
     * 角色列表
     */
    public function actionIndex(){
        return $this->renderPartial('index');
    }

    /**
     * 角色添加
     */
    public function actionAdd(){
        return $this->renderPartial('add');
    }
}