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
	<title>分类编辑</title>
	<link rel="stylesheet" href="/admin/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/admin/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li>信息中心</li>
			<li class="active">分类添加</li>
		</ol>
		<a class="btn btn-primary" href="<?=Url::to(['category/index']);?>" role="button"></span> 返回</a>
	    <?php if(Yii::$app->session->hasFlash('fail')):?>
	    <div class="alert alert-danger alert-dismissible" role="alert">
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      <strong><?php echo Yii::$app->session->getFlash('fail');?></strong>
	    </div>
	    <?php endif;?>
		<?php $form = ActiveForm::begin(['method' => 'post', 
										'options' => ['class' => 'form-horizontal', 
													  'enctype' => 'multipart/form-data'
													]
										]);?>
			<div class="form-group">
				<label for="category-name" class="col-md-1 control-label"><?php echo $labels['name'];?></label>
				<div class="col-md-3">
				<?php echo $form->field($model, 'name')->textInput(['class' => 'form-control', 'placeholder'=> '请输入分类名称'])->label(false);?>
				</div>
			</div>
			<div class="form-group">
				<label for="category-parent_id" class="col-md-1 control-label"><?php echo $labels['parent_id'];?></label>
				<div class="col-md-3">
				<?php echo $form->field($model, 'parent_id')->dropDownList($category)->label(false);?>	
				</div>
			</div>
			<div class="form-group">
				<label for="category-keywords" class="col-md-1 control-label"><?php echo $labels['keywords'];?></label>
				<div class="col-md-3">
				<?php echo $form->field($model, 'keywords')->textInput(['class' => 'form-control', 'placeholder'=> '请输入分类关键字，用半角逗号隔开'])->label(false);?>
				</div>
			</div>

			<div class="form-group">
				<label for="category-introduction" class="col-md-1 control-label"><?php echo $labels['introduction'];?></label>
				<div class="col-md-4">
				<?php echo $form->field($model, 'introduction')->textarea(['class' => 'form-control', 'rows' => 4])->label(false);?>
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