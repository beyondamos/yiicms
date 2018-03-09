<?php
namespace app\modules\admin\controllers;

use app\models\Member;


/**
 * 后台会员控制器
 */
class MemberController extends AdminBaseController {

	public function actionIndex() {
		$members = Member::find()->orderBy('lastlogintime desc')->asArray()->all();
		return $this->renderPartial('index', ['members' => $members]);
	}




}