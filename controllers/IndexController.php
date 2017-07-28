<?php
namespace app\controllers;

use app\controllers\HomeBaseController;
use Yii;

class IndexController extends HomeBaseController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}

