<?php
namespace app\modules\admin\controllers;

use app\modules\admin\controllers\AdminBaseController;
use app\tools\UploadFile;
use Yii;

/**
 * 工具控制器
 */
class ToolsController extends AdminBaseController
{

    public $enableCsrfValidation = false;
    //保存错误信息
    public $error = '';

    /**
     * 上传图片
     * @return [type] [description]
     */
    public function upload($files)
    {
        $upload = new UploadFile();
        //配置上传图片信息
        //保存路径
        $upload->savePath = 'pictures/';
        //子目录保存方式
        $upload->subName = array('date','Ym');
        $info = $upload->upload($files);
        if (!$info) {
            $this->error = $upload->getError();
            return false;
        } else {
            return $info;
        }
    }

    /**
     * ajax上传图片
     * @return [type] [description]
     */
    public function actionAjaxUploadImg()
    {
        $info = $this->upload('file');
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if ($info === false) {
            return ['status' => 0, 'info' => $this->error];
        } else {
            return ['status' => 1, 'info' => '/uploads/'.$info[0]['savepath'].$info[0]['savename']];
        }

    }



}