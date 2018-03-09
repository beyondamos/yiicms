<?php
use yii\helpers\Url;
$this->params['title'] = 'Daydaylearn会员信息密码修改页面';
?>

<!-- Daydaylearn会员信息密码修改页面start -->
<div class="container controller">

<?php echo $this->render('memberinfo', ['member' => $member]);?>
	
	<div class="controller-right edit-password">
		<div class="edit-password-con">
			<div class="edit-password-title">修改密码<a href="<?php echo Url::to(['member/index', 'id' => Yii::$app->session->get('memberinfo')['memberid']]);?>">返回用户中心</a></div>
			<form class="form-horizontal">
				  <div class="form-group">
				    <label for="oldpassword" class="col-sm-2 control-label">旧密码</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="oldpassword" placeholder="旧密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="newpassword" class="col-sm-2 control-label">新密码</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="newpassword" placeholder="新密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="repeatnewpassword" class="col-sm-2 control-label">重复新密码</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="repeatnewpassword" placeholder="重复新密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary">修改</button>
				    </div>
				  </div>
			</form>
		</div>
	</div>
</div>
<!-- Daydaylearn会员信息密码修改页面end  -->