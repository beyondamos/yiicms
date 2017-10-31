<?php
namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\admin\Accesslog;

/**
 * 流量统计控制器
 */
class FlowController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * 统计流量
     * @return [type] [description]
     */
    public function actionCount()
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            $ip = $request->get('userip');
            $shield_ips = array('127.0.0.1');
            // $shield_ips = array();
            if ( !in_array($ip, $shield_ips) ) {
                $accesslog = new Accesslog();
                $accesslog->ip = ip2long($ip);
                $accesslog->url = $request->get('url');
                $accesslog->visittime = $request->get('visittime');
                $accesslog->referrer = $request->get('referrer');
                $accesslog->year = $request->get('year');
                $accesslog->month = $request->get('month');
                $accesslog->day = $request->get('day');
                $accesslog->save();
            } 
        }
        
    }
} 