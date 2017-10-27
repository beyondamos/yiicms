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
        $begin_year = date('Y', $time);
        $begin_month = date('m', $time);
        $data = $this->find()->select(['id','day','count(id) as count' ])->where('year = :year and month= :month', [':year' => $begin_year, ':month' => $begin_month])->groupBy('day')->orderBy('day asc')->asArray()->all();
        $lineinfo = [];
        foreach ($data as $value) {
            $lineinfo[$value['day']] = $value['count'];
        }
        $xAxis_data = implode(',', array_keys($lineinfo));
        $series_data = implode(',', $lineinfo);
        return [
            'month' => $begin_month,
            'xAxis_data' => $xAxis_data,
            'series_data' => $series_data,
        ];
    } 

    
} 
