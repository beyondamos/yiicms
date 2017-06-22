<?php
namespace app\modules\admin\controllers;
use app\modules\admin\controllers\CommonController;
use Yii;
use app\models\Auth;
/**
 * Class AuthController
 * @package app\modules\admin\controllers
 * 后台权限控制器
 */
class AuthController extends CommonController{
    /**
     * 权限列表
     */
    public function actionIndex(){
        return $this->renderPartial('index');
    }

    public function actionAdd(){
        $request = Yii::$app->request;
        $model = new Auth();
        if($model->load($request->post()) && $model->validate()){
            if($model->save(false)){

            }else{

            }
        }else{
            return $this->renderPartial('add', ['model' => $model]);
        }

    }


}