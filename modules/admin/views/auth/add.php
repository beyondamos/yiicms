<?php
use yii\widgets\ActiveForm;
$labels = $model->attributeLabels();
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>权限添加</title>
	<link rel="stylesheet" href="<?=Yii::getAlias('@admin/lib').'/bootstrap/css/bootstrap.css';?>">
	<link rel="stylesheet" href="__CSS__/main.css">
</head>
<body>
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li>用户管理</li>
			<li class="active">权限添加</li>
		</ol>
		<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]);?>
			<div class="form-group">
				<label for="auth_name" class="col-md-1 control-label"><?=$labels['auth_name'];?></label>
				<div class="col-md-3">
					<input type="text" class="form-control" id="auth_name" name="Auth[auth_name]" placeholder="请输入权限名称">
				</div>
			</div>
			<div class="form-group">
				<label for="parent_id" class="col-md-1 control-label"><?=$labels['parent_id'];?></label>
				<div class="col-md-3 ">
					<select name="Auth[parent_id]" class="form-control">
						<option value="0">请选择上级权限</option>
						<option value="1">1级权限</option>
						<option value="2">2级权限</option>
						<option value="3">3级权限</option>
						<option value="4">4级权限</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="auth_route" class="col-md-1 control-label"><?=$labels['auth_route']?></label>
				<div class="col-md-3">
					<input type="text" class="form-control" id="auth_route" name="Auth[auth_route]" placeholder="请输入权限路由">
				</div>
			</div>
			<div class="form-group">
				<label for="auth_type" class="col-md-1 control-label"><?=$labels['auth_type']?></label>
				<div class="col-md-3">
					<label class="radio-inline">
						<input type="radio" name="Auth[auth_type]"  value="1"> 导航中显示
					</label>
					<label class="radio-inline">
						<input type="radio" name="Auth[auth_type]"  value="2"> 导航中不显示
					</label>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-1 col-md-2">
					<input class="btn btn-info" type="submit" value="提交" >
					<input class="btn btn-danger" type="reset" value="重置">
				</div>

			</div>
		<?php ActiveForm::end();?>
	</div>
	<script src="<?=Yii::getAlias('@admin/lib').'/jquery/jquery-1.11.3.js';?>"></script>
	<script src="<?=Yii::getAlias('@admin/lib').'/bootstrap/js/bootstrap.min.js';?>"></script>
</body>
</html>