<?php
namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\Comment;

/**
 * 评论回复控制器
 */
class CommentController extends Controller {

	/**
	 * 添加评论
	 * @return [type] [description]
	 */
	public function actionAdd() {
		if (!Yii::$app->request->isPost) {
			return false;
		}
		$referrer = Yii::$app->request->getReferrer();
		if (is_null($referrer))  {
			return false;
		}
		$data = Yii::$app->request->post();
		$comment = new Comment();
		if ( $comment->load($data) && $comment->validate()) {
			$comment->referrer = $referrer;
			$comment->comment_time = time();
			$comment->member_id = Yii::$app->session->get('memberinfo')['memberid'];
			$comment->addComment();
			Yii::$app->session->setFlash('success', '创建回复成功');
		} else {
			Yii::$app->session->setFlash('fail', $comment->errors);
		}
		return $this->redirect($referrer);

	}




}

