<?php
namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;

/**
 * 后台公共控制器
 */
class AdminBaseController extends Controller
{
    public $user_id = null;



    public function init()
    {

        if (!$this->isLogin()) {
            return $this->redirect(['/admin/login/index']);
        }

    }

    /**
     * 判断是否已经登录
     * @return boolean [description]
     */
    private function isLogin()
    {
        $session = Yii::$app->session;
        if ($user_id = $session->get('user_id')) {
            $this->user_id = $user_id;
            return true;
        }
        return false;

    }



}
