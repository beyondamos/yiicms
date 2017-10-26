<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;
use app\models\admin\Accesslog;
use yii\data\Pagination;
use Yii;

/**
 * 访问日志控制器
 */
class AccesslogController extends AdminBaseController
{
    public $layout = false;

    /**
     * 列表
     * @return [type] [description]
     */
    public function actionIndex()
    {
        $query = Accesslog::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 25]);
        $logs = $query->offset($pagination->offset)->limit($pagination->limit)->orderBy('id desc')
                ->asArray()->all();
        return $this->render('index', ['logs' => $logs, 'pagination' => $pagination]);
    }


    /**
     * 删除访问日志
     * @return [type] [description]
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id');
        $model = Accesslog::find()->where(['id' => $id])->one();
        $model->delete();
        Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
        return $this->goBack();
    }




}
