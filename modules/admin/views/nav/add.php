<?php 
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
$labels = $model->attributeLabels();
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>导航添加</title>
	<link rel="stylesheet" href="/admin/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/admin/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li>系统管理</li>
			<li class="active">导航添加</li>
		</ol>
		<a class="btn btn-primary" href="<?=Url::to(['nav/index']);?>" role="button"></span> 返回</a>
	    <?php if(Yii::$app->session->hasFlash('fail')):?>
	    <div class="alert alert-danger alert-dismissible" role="alert">
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      <strong><?php echo Yii::$app->session->getFlash('fail');?></strong>
	    </div>
	    <?php endif;?>
		<?php $form = ActiveForm::begin(['method' => 'post', 
										'action' => Url::to(['nav/add']), 
										'options' => ['class' => 'form-horizontal', 
													]
										]);?>
			<div class="form-group">
				<label for="nav-nav_name" class="col-md-1 control-label"><?php echo $labels['nav_name'];?></label>
				<div class="col-md-3">
				<?php echo $form->field($model, 'nav_name')->textInput(['class' => 'form-control', 'placeholder' => '请输入导航名称'])->label(false);?>
				</div>
			</div>
			<div class="form-group">
				<label for="nav-parent_id" class="col-md-1 control-label"><?php echo $labels['parent_id'];?></label>
				<div class="col-md-3">
				<?php echo $form->field($model, 'parent_id')->dropDownList($navs)->label(false);?>	
				</div>
			</div>
			<div class="form-group">
				<label for="nav-nav_url" class="col-md-1 control-label"><?php echo $labels['nav_url'];?></label>
				<div class="col-md-4">
				<?php echo $form->field($model, 'nav_url')->textInput(['class' => 'form-control'])->label(false);?>
				</div>
			</div>
			<div class="form-group">
				<label for="nav-is_blank" class="col-md-1 control-label"><?php echo $labels['is_blank'];?></label>
				<div class="col-md-1">
				<?php echo $form->field($model, 'is_blank')->dropDownList([ 0 => '否', 1 => '是'])->label(false);?>
				</div>
			</div>
			<div class="form-group">
				<label for="nav-status" class="col-md-1 control-label"><?php echo $labels['status'];?></label>
				<div class="col-md-1">
				<?php echo $form->field($model, 'status')->dropDownList([ 1 => '生效', 0 => '禁用'])->label(false);?>	
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
	<script src="/admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>