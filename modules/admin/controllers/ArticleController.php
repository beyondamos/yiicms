<?php
/**
 * 后台文章控制器
 */
namespace app\modules\admin\controllers;
use app\modules\admin\controllers\CommonController;
use Yii;

class ArticleController extends CommonController{
    /**
     * 文章列表
     */
    public function actionIndex(){

        return $this->renderPartial('index');
    }

    /**
     * 未审核列表
     */
    public function actionUnaudited(){
        return $this->renderPartial('unaudited');
    }


    /**
     * 文章添加
     */
    public function actionAdd(){
        $request = Yii::$app->request;
        if($request->isPost){

        }else{
            return $this->renderPartial('add');
        }
    }
}