<?php
namespace app\controllers;

use app\controllers\HomeBaseController;

/**
 * Class ArticleController
 * @package app\controllers
 * 前台文章控制器
 */

class ArticleController extends HomeBaseController
{

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionDetail()
    {
        return $this->render('detail');
    }


}
