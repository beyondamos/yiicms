<?php
/**
 * 后台分类控制器
 */
namespace app\modules\admin\controllers;
use app\modules\admin\controllers\CommonController;
use Yii;

class CategoryController extends CommonController{
    /**
     * 分类列表
     */
    public function actionIndex(){
        return $this->renderPartial('index');
    }

    /**
     * 分类添加
     */
    public function actionAdd(){
        $request = Yii::$app->request;
        if($request->isPost){

        }else{
            return $this->renderPartial('add');
        }
    }
}