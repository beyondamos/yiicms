<?php
namespace app\modules\admin\controllers;

use app\models\Comment;
use Yii;

/**
 * 后台评论控制器
 */

class CommentController extends AdminBaseController {
	public $layout = false;

	/**
	 * 评论列表
	 * @return [type] [description]
	 */
	public function actionIndex() {
		$comments = Comment::find()->with('member', 'article')->where(['status' => 1])->orderBy('comment_time desc')->asArray()->all();

		return $this->renderPartial('index', ['comments' => $comments]);
	}


	/**
	 * 删除评论
	 * @return [type] [description]
	 */
	public function actionDelete() {
		Yii::$app->user->setReturnUrl(Yii::$app->request->getReferrer());
		$id = Yii::$app->request->get('id');
		if ( !is_numeric($id) || ( $id <= 0 ) ) {
			Yii::$app->session->setFlash('fail', '未知错误！');
		} else {
			$comment = Comment::find()->where(['comment_id' => $id])->one();
			if ($comment) {
				$comment->status = 0;
				$comment->save(false);
				Yii::$app->session->setFlash('success', '删除评论成功！');
			} else {
				Yii::$app->session->setFlash('fail', '未知错误！');
			}
		}

		return $this->goBack();
	}

}
