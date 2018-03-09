<?php
namespace app\models;

use Yii;

/**
 * 会员模型
 */
class Member extends BaseModel {

	public $password; //密码
	public $password2;//重复密码

	public $error; //错误信息

	public static function tableName() {
		return 'member';
	}


	public function rules() {
		return [
			[['username', 'email'], 'filter', 'filter' => 'trim', 'skipOnArray' => true , 'on'=> [
			'add, login']],
			['username', 'required', 'message' => '用户名不能为空！' , 'on' => ['add', 'login']],
			['username', 'unique', 'message' => '用户名已经存在！', 'on' => ['add']], 
			['username', 'match', 'pattern' => '/^\w*$/i', 'message' => '用户名必须是数字、字母和下划线的组合!', 'on' => ['add']],
			['username', 'string', 'min' => 6, 'max' => 18, 'message' => '用户名必须是6到18位!', 'on' => ['add']],
			['email', 'required', 'message' => '邮箱不能为空！', 'on' => ['add']],
			['email', 'unique', 'message' => '邮箱已经存在！', 'on' => ['add']],
			['email', 'email', 'message' => '邮箱格式不正确！', 'on' => ['add']],
			['password', 'required', 'message' => '密码不能为空', 'on' => ['add', 'login']],
            ['password', 'match', 'pattern' => '/^\w*$/i', 'message' => '密码必须为数字、字母和下划线的组合！', 'on' => ['add']],
            ['password', 'string', 'min' => 8, 'max' => 18, 'message' => '密码必须是8到18位！', 'on' => ['add']],
			['password2', 'required', 'message' => '重复密码不能为空！', 'on' => ['add']],
            ['password2', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码不一致!', 'on' => ['add']],
			
		];
	}



	//添加会员
	public function addMember() {
		//处理密码
		$this->passwordhash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
		//头像图片地址
		$this->headpicture = '/home/headpic/' . mt_rand(1,100). '.jpg';

		$this->registertime = time();
		if ($this->save(false)) {
			return true;
		}
		return false;
	}



	public function login() {
		$member = $this->find()->where(['username' => $this->username])->one();
		if (!$member) {
			$this->error = '用户名或者密码错误！';
			return false;
		}

		//比较密码
		if (!$result = Yii::$app->getSecurity()->validatePassword($this->password, $member->passwordhash)){

			$this->error = '用户名或者密码错误！';
			return false;
		}	


		//如果验证正确，保存用户信息到session
		Yii::$app->session->set('memberinfo', [
				'memberid' => $member->id,
				'memberusername' => $member->username,
				'lastlogintime' => $member->lastlogintime
			]);

		$member->lastlogintime = time();
		$member->save();
		return true;

	}


	public function getIdByUsername($username) {
		$member = $this->find()->select(['id'])->where(['username' => $username])->one();
		if ($member) {
			return $member->id;
		} else {
			return false;
		}
	}


}