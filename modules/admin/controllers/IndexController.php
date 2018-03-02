<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;
use Yii;
use app\models\admin\User;

/**
 * 后台首页控制器
 */
class IndexController extends AdminBaseController
{

    /**
     * 后台首页
     * @return string
     */
    public function actionIndex(){

        return $this->renderPartial('index');
    }

    public function actionHead(){
        return $this->renderPartial('head');
    }

    public function actionLeft(){
        return $this->renderPartial('left');
    }

    /**
     * 后台登录默认页
     * @return [type] [description]
     */
    public function actionMain(){

        return $this->renderPartial('main');
    }

}
