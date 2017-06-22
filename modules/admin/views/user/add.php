<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$labels = $model->attributeLabels(); //标签属性
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>用户添加</title>
    <link rel="stylesheet" href="<?=Yii::getAlias('@admin/lib').'/bootstrap/css/bootstrap.css';?>">
</head>
<body>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li><a href="#">首页</a></li>
            <li>用户中心</li>
            <li class="active">用户添加</li>
        </ol>
        <a class="btn btn-primary" href="<?=Url::to(['user/index'])?>" role="button"><span class="glyphicon glyphicon-remove"></span> 取消</a>
        <?php if (Yii::$app->session->hasFlash('success')) : ?>
            <div class="alert alert-info" role="alert">添加信息成功</div>
        <?php endif;?>
        <?php if (Yii::$app->session->hasFlash('fail')) : ?>
            <div class="alert alert-danger" role="alert">添加信息失败</div>
        <?php endif;?>
        <?php $form = ActiveForm::begin(['fieldConfig' => [
                'template' => '{input}{error}',
            ],'options' => ['class'=> 'form-horizontal', 'method' => 'post', 'action' => ['user/add']]]);?>
        <div class="form-group">
            <label for="username" class="col-md-2 control-label"><?=$labels['username'];?></label>
            <div class="col-md-2">
                <?php echo $form->field($model, 'username')->label(false)?>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-md-2 control-label"><?=$labels['password'];?></label>
            <div class="col-md-2">
                <?php echo $form->field($model, 'password')->passwordInput()->label(false);?>
            </div>
        </div>
        <div class="form-group">
            <label for="password2" class="col-md-2 control-label"><?=$labels['password2'];?></label>
            <div class="col-md-2">
                <?php echo $form->field($model, 'password2')->passwordInput()->label(false);?>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-2 control-label"><?=$labels['email'];?></label>
            <div class="col-md-2">
                <?php echo $form->field($model, 'email')->textInput()->label(false);?>
            </div>
        </div>
        <div class="form-group">
            <label for="role_id" class="col-md-2 control-label"><?=$labels['role_id'];?></label>
            <div class="col-md-2">
                <?php echo $form->field($model, 'role_id')->dropdownList(['0' => '请选择角色', 
                                                                           '1' => '超级管理员',
                                                                           '2' => '数据分析员',
                                                                           '3' => '普通用户'      
                                                                        ])->label(false);?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">提交</button>
                <button type="reset" class="btn btn-warning">重置</button>
            </div>
        </div>
        <?php ActiveForm::end();?>
    </div>
    <script src="<?=Yii::getAlias('@admin/lib').'/jquery/jquery-1.11.3.js';?>"></script>
    <script src="<?=Yii::getAlias('@admin/lib').'/bootstrap/js/bootstrap.min.js'?>"></script>
</body>
</html>
