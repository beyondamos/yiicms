<?php
namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;
use app\models\admin\User;

/**
 * 后台公共控制器
 */
class AdminBaseController extends Controller
{
    public $user_id = null;


    /**
     * 后台初始化
     * @return [type] [description]
     */
    public function init()
    {
        //如果未登录
        if (!$this->isLogin()) {
            return $this->redirect(['/admin/login/index']);
        }

        //如果已经登录 配置用户信息
        $user_id = $this->user_id;
        $user =  User::find()->select(['id', 'username', 'nickname', 'role_id', 'lastlogintime', 'lastloginip', 'logintimes'])->where(['id' => $user_id])->one();
        $role = $user->role;
        $user_info = [
            'username' => $user->username,
            'nickname' => $user->nickname,
            'role_name' => $role->role_name,
            'lastlogintime' => date('Y-m-d H:i:s', $user->lastlogintime),
            'lastloginip' => long2ip($user->lastloginip),
            'logintimes' => $user->logintimes + 1
        ];
        $view = Yii::$app->view;  
        $view->params['user_info'] = $user_info;  

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
