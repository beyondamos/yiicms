<?php
namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\admin\LoginForm;
use Yii;
use app\models\admin\User;

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

        $model = new LoginForm();

        if (Yii::$app->request->isPost) {
            //先验证 验证码
            
            //验证用户名密码
            $data = Yii::$app->request->post();

            if ($model->load($data) && $model->validate()) {
                $this->login($model);
            } else {
                
            }

        }

        return $this->render('index', ['model' => $model]);
    }


    /**
     * 退出登录
     * @return [type] [description]
     */
    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->remove('user_id');
        return $this->redirect(['/admin/login/index']);
    }

    /**
     * 独立操作
     * @return [type] [description]
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'maxLength' => 4, //最大显示个数
                'minLength' => 4,//最少显示个数
                'height'=>40,//高度
                'width' => 130,  //宽度  
                'offset' => 5,
            ]
        ];
    }

    /**
     * 登录
     * @param  [type] $model [description]
     * @return [type]        [description]
     */
    public function login($model)
    {
        $user = User::findone(['username' => $model->username]);
        $session = Yii::$app->session;
        $session->set('user_id', $user->id);
        return $this->redirect(['index/index']);
    }


}
