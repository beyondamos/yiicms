<?php
namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\admin\User;
use Yii;

/**
 * 后台登录控制器
 * @package app\modules\admin\controllers
 */
class LoginController extends Controller
{

    public $layout = false;
    /**
     * 登录
     */
    public function actionIndex(){

        $model = new User();

        if (Yii::$app->request->isPost) {
            //先验证 验证码
            
            //验证用户名密码
            $data = Yii::$app->request->post();
            if ($user_id = $model->login($data)) {
                $session = Yii::$app->session;
                $session->set('user_id', $user_id);
                return $this->redirect(['index/index']);
            }
            //显示错误
        }

        return $this->render('index', ['model' => $model]);
    }


}
