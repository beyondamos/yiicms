<?php
namespace app\controllers;

use app\controllers\CommonController;

/**
 * Class ArticleController
 * @package app\controllers
 * 前台文章控制器
 */
class ArticleController extends CommonController
{
    public function actionIndex(){
        return $this->render('index');
    }
}
