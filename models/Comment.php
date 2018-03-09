<?php
namespace app\models;

use yii\helpers\Url;


/**
 * 评论回复模型
 */
class Comment extends BaseModel {
	public $referrer = null;//当前评论页面URL


	public static function tableName() {
		return 'comment';
	} 

	public function rules() {
		return [
			['content', 'required', 'message' => '回复不能为空！'],
			['article_id', 'required', 'message' => '文章id不能为空！'],
		];
	}


	/**
	 * 添加评论
	 */
	public function addComment() {
		$this->floor = $this->getFloor();

		$this->content = $this->dealContent();

		$this->save(false);
	}


	/**
	 * 获取楼层数
	 * @return [type] [description]
	 */
	private function getFloor() {
		$data = Comment::find()->select(['max(`floor`) as maxfloor'])->where(['article_id' => $this->article_id])->asArray()->one();
		if ($data['maxfloor']) {
			return $data['maxfloor']+1;
		} elseif ( is_null($data['maxfloor']) ) {
			return 1;
		}
	}

	/**
	 * 关联Member模型
	 * @return [type] [description]
	 */
	public function getMember() {
		return $this->hasOne(Member::className(), ['id' => 'member_id'])->select(['id', 'username', 'headpicture']);
	}

	/**
	 * 关联Article模型
	 * @return [type] [description]
	 */
	public function getArticle() {
		return $this->hasOne(Article::className(), ['id' => 'article_id'])->select(['id','title']);
	}


	/**
	 * 处理内容
	 * @return [type] [description]
	 */
	public function dealContent() {
		if (preg_match('/@\w{6,18} #\d{1,3}/i', $this->content , $arr)) {
			list($username, $floor) = explode(' ', $arr[0]);
			$trueusername = ltrim( $username, '@');
			$member = new Member();
			if ($id = $member->getIdByUsername($trueusername) > 0 ) {
				$username = '<a href="'. Url::to(['member/index', 'id' => $id]) .'" target="_blank" class="text-info">' . $username . '</a>';
				$floor = '<a href="'.$this->referrer.'#floor'. ltrim($floor, '#') . '" class="text-info">'. $floor .'</a>';
				$replace_str = $username. ' ' . $floor;
				$content = str_replace($arr[0], $replace_str , $this->content);
				return $content;
			}
			return $this->content;
		}
		
		return $this->content;
	}


}
