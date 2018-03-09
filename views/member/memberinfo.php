<?php
	use yii\helpers\Url;
?>
	<div class="controller-left">
		<div class="controller-left-pic"><img src="<?php echo $member['headpicture']?>" alt=""></div>
		<div class="controller-left-title"><?php echo $member['username'];?></div>
		<div class="controller-left-line"></div>
		<div class="controller-left-con">
			<p>
				<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
				注册日期：<?php echo date('Y-m-d', $member['registertime']);?></p>
			<p> 
				<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
				最后登录：<?php echo date('Y-m-d H:i', $member['lastlogintime']);?></p>
			<p>
				<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
				邮箱：<?php echo $member['email'];?></p>
			<p>
			<?php if($this->params['islogin'] == 1):?>
			<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
			<a href="<?php echo Url::to(['member/editpwd']);?>">修改密码</a></p>
			<?php endif;?>
		</div>
	</div>