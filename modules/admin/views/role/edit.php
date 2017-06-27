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
    <title>角色添加</title>
    <link rel="stylesheet" href="<?= Yii::getAlias('@admin/lib') . '/bootstrap/css/bootstrap.css'; ?>">
</head>
<body>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li><a href="#">首页</a></li>
            <li>用户中心</li>
            <li>角色管理</li>
            <li class="active">角色编辑</li>
        </ol>
        <a class="btn btn-primary" href="<?= Url::to(['role/index']) ?>" role="button"><span
            class="glyphicon glyphicon-remove"></span> 取消</a>
            <?php if (Yii::$app->session->hasFlash('fail')):?>
            <div class="alert alert-danger" role="alert"><?php echo Yii::$app->session->getFlash('fail');?></div>
            <?php endif;?>
            <?php  $form = ActiveForm::begin(['options' => ['id' => 'role','class' => 'form-horizontal']]) ?>
            <div class="form-group">
                <label for="role_name" class="col-md-2 control-label"><?= $labels['role_name'] ?></label>
                <div class="col-md-2">
                    <?php echo $form->field($model, 'role_name')->textInput(['class' => 'form-control', 'placeholder' => '请输入角色名称'])->label(false);?>
                </div>
            </div>
            <div class="form-group">
                <label for="role_desc" class="col-md-2 control-label"><?= $labels['role_desc'] ?></label>
                <div class="col-md-2">
                    <?php echo $form->field($model, 'role_desc')->textarea(['class' => 'form-control', 'rows' => '4', 'placeholder' => '请输入角色描述信息'])->label(false);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><?= $labels['role_auth'] ?></label>
                <div class="col-md-10">
                    <?php foreach($auth_list as $val):?>
                        <?php if($val['parent_id'] == 0):?>
                            <div class="row">
                                <label class="control-label col-md-1">
                                    <input type="checkbox"> <?php echo $val['auth_name'];?>
                                </label>
                                <div class="col-md-7">
                                <?php foreach($auth_list as $value):?>
                                        <?php if($value['parent_id'] == $val['auth_id']):?>
                                            <label class="control-label col-md-2">
                                                <input type="checkbox" name="Role[role_auth][]" 
                                                <?php if(in_array($value['auth_id'], $model->role_auth)){ echo 'checked';}?>
                                                value="<?php echo $value['auth_id']?>"> <?php echo $value['auth_name'];?>
                                            </label>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                    <p class="help-block help-block-error" style="color: #a94442;">
                        <?php 
                            if(isset($model->errors['role_auth'][0])) {
                                echo $model->errors['role_auth'][0];
                            }
                        ?>
                    </p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <!-- <input type="hidden" name="role_id" value="<?php  ?>"> -->
                    <button type="submit" class="btn btn-info">提交</button>
                    <button type="reset" class="btn btn-warning">重置</button>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <script src="<?= Yii::getAlias('@admin/lib') . '/jquery/jquery-1.11.3.js'; ?>"></script>
        <script src="<?= Yii::getAlias('@admin/lib') . '/bootstrap/js/bootstrap.min.js'; ?>"></script>
    </body>
    </html>
