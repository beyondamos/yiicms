<?php
namespace app\controllers;

use Yii;
use app\models\Member;
use app\models\Comment;
use yii\captcha\CaptchaAction;

class MemberController extends HomeBaseController {

	public function actions() {
		return [
			'captcha'  => [
				'class' => 'yii\captcha\CaptchaAction',
                // 'backColor'=>0x000000,//背景颜色
                'maxLength' => 4, //最大显示个数
                'minLength' => 4,//最少显示个数
                // 'padding' => 5,//间距
                'height'=> 40,//高度
                'width' => 130,  //宽度  
                // 'foreColor'=> 0xffffff,     //字体颜色
                'offset'=> 5,        //设置字符偏移量 有效果
 			]
		];
	}





	/**
	 * 会员注册页面
	 * @return [type] [description]
	 */
	public function actionRegister() {
		$model = new Member;
		if (Yii::$app->request->isPost) {
			$data = Yii::$app->request->post();
			$model->scenario = 'add';

			if (!$this->createAction('captcha')->validate( $data['verifyCode'] , false) ) {
				Yii::$app->session->setFlash('codefail', '验证码错误！');
				return $this->redirect(['member/register']);
			}


			if ($model->load($data) && $model->validate() ) {
				if ($model->addMember() ) {
					Yii::$app->session->setFlash('registersuccess', '注册成功！登录开始新的旅程吧！');
					return $this->redirect(['member/login']);
				} else {
					Yii::$app->session->setFlash('error', '服务器出现未知错误！');
				}
 			} else {
 				//验证失败 设置错误信息
 				Yii::$app->session->setFlash('fail', $model->errors);
 			}	
		} 
		//非POST提交
		return $this->render('register');
	}


	/**
	 * 会员登录
	 * @return [type] [description]
	 */
	public function actionLogin() {

		$model = new Member();
		if (Yii::$app->request->isPost) {
			$data = Yii::$app->request->post();
			$model->scenario = 'login';

			if (!$this->createAction('captcha')->validate( $data['verifyCode'] , false) ) {
				Yii::$app->session->setFlash('codefail', '验证码错误！');
				return $this->redirect(['member/login']);
			}


			if ($model->load($data) && $model->validate()) {
				if ($model->login()) {
					$cookies = Yii::$app->request->cookies;
					$returnUrl = $cookies->getValue('returnUrl', '/');//设置默认值
					return $this->redirect($returnUrl);
				} else {
					Yii::$app->session->setFlash('error', $model->error);
				}
			} else {
				Yii::$app->session->setFlash('fail', $model->errors);
			}

		}

		//设置来源页面
		$cookies = Yii::$app->response->cookies;
		$cookies->add(new \yii\web\Cookie([
		    'name' => 'returnUrl',
		    'value' => !empty(Yii::$app->request->getReferrer()) ? Yii::$app->request->getReferrer() : '',
		    'expire'=>time()+300
		]));

		//非POST提交
		return $this->render('login');
	}


	public function actionLogout() {
		$session = Yii::$app->session;
		$session->remove('memberinfo');
		Yii::$app->user->setReturnUrl(Yii::$app->request->getReferrer());
		return $this->goBack();
	}

	/**
	 * 会员首页
	 * @return [type] [description]
	 */
	public function actionIndex() {
		$id = Yii::$app->request->get('id');
		if (!is_numeric($id) || $id <= 0 ) {
			return false;
		}
		//会员信息
		$member = Member::find()->where(['id' => $id])->asArray()->one();

		//回复信息
		$comment = Comment::find()->where(['member_id' => $id ])->with('article')->orderBy('comment_time desc')->asArray()->all();

		return $this->render('index', ['member' => $member, 'comments' => $comment]);
	}

	public function actionEditpwd() {
		//会员信息
		$member = Member::find()->where(['id' => $this->member_id])->asArray()->one();
		return $this->render('editpwd', ['member' => $member]);
	}


	public function actionResetpwd() {
		return $this->render('resetpwd');
	}




}

