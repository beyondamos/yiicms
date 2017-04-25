<?php
/**
 * 国家控制器
 */
namespace app\controllers;
use yii\data\Pagination;
use yii\web\Controller;
use app\models\Country;

class CountryController extends Controller{

    public function actionIndex(){
        $query = Country::find();
        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount'    => $query->count(),
        ]);

        $countries = $query->orderBy('name')->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('index',[
            'countries' => $countries,
            'pagination'    =>  $pagination,
        ]);
    }

}