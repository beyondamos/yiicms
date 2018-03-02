<?php
namespace app\models\admin;

use app\models\AdminBase;

/**
 * 访问日志模型
 */
class Accesslog extends AdminBase
{
    public static function tableName()
    {
        return 'accesslog';
    }

    
    /**
     * 获取访问数据的折线图信息
     * 获取30天内的信息
     * @return [type] [description]
     */
    public function getLineInfo()
    {
        $time = time();
        $todaytime = strtotime(date('Y-m-d', $time));  //今日凌晨的时间
        $start_time = $todaytime-3600*24*20;
        $start_year = date('Y', $start_time);
        $start_month = date('m', $start_time);
        $start_day = date('d', $start_time);


        $data = $this->find()
                ->select(['month', 'day' ,'count(*) as count'])
                ->where(['>=', 'visittime', $start_time])
                ->orderBy('year asc, month asc, day asc')
                ->groupBy('day')
                ->asArray()
                ->all();

        foreach ($data as $key => $val) {
            $xAxis_data[] = $val['month'].'.'.$val['day'];
            $series_data[] = $val['count'];
        }

        $xAxis_data = implode(',', $xAxis_data);
        $series_data = implode(',', $series_data);
        return [
            'xAxis_data' => $xAxis_data,
            'series_data' => $series_data,
        ];
    } 

    
} 
