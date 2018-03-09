<?php
use yii\helpers\Url;
$this->params['title'] = 'Daydaylearn会员信息页面';
?>
<!-- Daydaylearn会员信息页面代码start -->
<div class="container controller">
	<?php echo $this->render('memberinfo', ['member' => $member]);?>
	<div class="controller-right">
		<ul class="controller-right-title clearfix">
			<li class="active">最新回复</li>
			<li>最新主题</li>
			<li>最新收藏</li>
		</ul>
		<ul class="controller-right-content clearfix">
			<?php foreach($comments as $comment):?>
			<li>
				<div class="controller-right-content-link">
					<a href="<?php echo Url::to(['article/detail', 'id' => $comment['article_id']]);?>" target="_blank"><?php echo $comment['article']['title'];?></a>
					<span><?php echo date('Y-m-d H:i:s', $comment['comment_time']);?></span>
				</div>
				<p><?php echo $comment['content']?></p>
			</li>
			<?php endforeach;?>
		</ul>
		<nav aria-label="Page navigation" class="controller-right-page">
		  <ul class="pagination">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li>
		      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
		</nav>
	</div>
</div>
<!-- Daydaylearn会员信息页面代码end -->