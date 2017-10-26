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

    

    
} 