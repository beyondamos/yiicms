<?php
namespace app\models\admin;

use app\models\AdminBase;

/**
 * Class Auth
 * @package app\models
 * 权限模型
 */
class Auth extends AdminBase
{
    public static function tableName()
    {
        return 'auth';
    }

    public function getSortAuth()
    {
        return $this->find()->asArray()->all();
    }
}
