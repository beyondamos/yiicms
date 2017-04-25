<?php
namespace app\controllers;
use app\models\Country;
use yii\web\Controller;
use app\models\EntryForm;
use Yii;

class IndexController extends Controller{

    public function actionTest(){
        $model = new EntryForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            return $this->render('entry-confirm',['model' => $model]);
        }else{
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionTest2(){
        $country = Country::findOne('US');
        $country->name = 'U.S.A';
        $country->save();
    }

}