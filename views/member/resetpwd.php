<?php
use yii\helpers\Url;
$this->params['title'] = 'Daydaylearn重置密码页面';
?>
<!-- Daydaylearn重置密码页面start -->
<div class="register login resetpwd">

	<div class="container register-container">
		<h3 class="register-title">密码重置请求</h3>
		<!-- 左侧注册部分代码start -->
		<div class="register-left">
			<?php 
			if (Yii::$app->session->hasFlash('fail')) {
				$errors = Yii::$app->session->getFlash('fail');
			}
			?>

			<?php if (Yii::$app->session->hasFlash('registersuccess')) :?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo Yii::$app->session->getFlash('registersuccess');?></strong>
				</div>
			<?php endif;?>

			<?php if (Yii::$app->session->hasFlash('error')) :?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo Yii::$app->session->getFlash('error');?></strong>
				</div>
			<?php endif;?>
			<p>请填写您的电子邮件，一个重置密码的链接将被发送到您提供的邮箱。</p>
			<form action="" method="post">
				
				<div class="form-group <?php echo isset($errors['email'][0]) ? 'has-error' : '';?>">
					<label for="memberemail">电子邮箱</label>
					<input type="email" class="form-control" name="Member[email]" id="memberemail" placeholder="请输入电子邮箱">
					<p class="help-block help-block-error"><?php echo isset($errors['email'][0]) ? $errors['email'][0] : '';?></p>
				</div>
				<div class="form-group">
					<label for="VerificationCodes">验证码</label>
					<div class="verificationCode">
						<input type="input" class="form-control" name="verificationCode" id="VerificationCodes" placeholder="请输入验证码">
						<img src="/home/images/code.gif" alt="">
					</div>
					<p class="help-block"></p>
				</div>
				<div class="login-help">想起来啦？！赶紧&nbsp;<a href="<?php echo Url::to(['member/login']);?>">登录</a>。</div>
				<input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->csrfToken?>" />
				<input type="submit" class="btn btn-primary" value="发送">
			</form>
		</div>
		<!-- 左侧注册部分代码end -->
		<!-- 右侧描述部分代码start-->
		<div class="register-right">
			<ul class="clearfix register-right-pic">
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
			</ul>
			<div class="register-right-login">
				没有账号？<a href="#">注册新会员</a>
			</div>
			<div class="register-right-content">
				<h2>登录后可以？</h2>
				<p>1、分享您的教程，扩展，源码</p>
				<p>2、参与问题和帖子的讨论，回复和评分</p>
				<p>3、收藏具有价值的教程和帖子</p>
			</div>
		</div>

		<!-- 右侧描述部分代码end -->


</div> <!-- end container -->

</div> <!-- end content -->