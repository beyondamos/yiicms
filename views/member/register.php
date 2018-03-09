<?php
use yii\helpers\Url;

$this->params['title'] = 'Daydaylearn会员注册';
?>
<div class="register">

	<div class="container register-container">
		<h3 class="register-title">注册</h3>
		<!-- 左侧注册部分代码start -->
		<div class="register-left">
			<?php
			if (Yii::$app->session->hasFlash('fail')) {
				$errors = Yii::$app->session->getFlash('fail');
			}
			?>


			<?php if (Yii::$app->session->hasFlash('error')) :?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo Yii::$app->session->getFlash('error');?></strong>
				</div>
			<?php endif;?>
			<form action="" method="post">
				<div class="form-group <?php echo isset($errors['username'][0]) ? 'has-error' : '';?>">
					<label for="memberusername">用户名</label>
					<input type="input" class="form-control" id="memberusername" name="Member[username]" placeholder="请输入用户名">
					<p class="help-block help-block-error"><?php echo isset($errors['username'][0]) ? $errors['username'][0] : '' ;?></p>
				</div>
				<div class="form-group <?php echo isset($errors['email'][0]) ? 'has-error' : '';?>">
					<label for="memberemail">电子邮箱</label>
					<input type="input" class="form-control" name="Member[email]" id="memberemail" placeholder="请输入电子邮箱">
					<p class="help-block help-block-error"><?php echo isset($errors['email'][0]) ? $errors['email'][0] : '';?></p>
				</div>
				<div class="form-group <?php echo isset($errors['password'][0]) ? 'has-error' : '';?>">
					<label for="memberpassword">密码</label>
					<input type="password" class="form-control" name="Member[password]" id="memberpassword" placeholder="请输入密码">
					<p class="help-block help-block-error"><?php echo isset($errors['password'][0]) ? $errors['password'][0] : '';?></p>
				</div>
				<div class="form-group <?php echo isset($errors['password2'][0]) ? 'has-error' : '';?>">
					<label for="memberpassword2">重复密码</label>
					<input type="password" class="form-control" name="Member[password2]" id="memberpassword2" placeholder="重复密码">
					<p class="help-block"><?php echo isset($errors['password2'][0]) ? $errors['password2'][0] : '';?></p>
				</div>
				<div class="form-group <?php echo Yii::$app->session->hasFlash('codefail') ? 'has-error' : '';?>">
					<label for="VerificationCodes">验证码</label>
					<div class="verificationCode">
						<input type="input" class="form-control" name="verifyCode" id="VerificationCodes" placeholder="请输入验证码">
						<img src="<?php echo Url::to(['member/captcha']);?>" alt="">
					</div>
					<p class="help-block help-block-error"><?php echo  Yii::$app->session->hasFlash('codefail') ? Yii::$app->session->getFlash('codefail') : '';?></p>
				</div>
				<input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->csrfToken?>" />
				<input type="submit" class="btn btn-primary" value="注册">
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
				已有账号？<a href="<?php echo Url::to(['member/login']);?>">点此登录</a>
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
