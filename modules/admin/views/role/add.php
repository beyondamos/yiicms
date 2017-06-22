<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;

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
        <li class="active">角色添加</li>
    </ol>
    <a class="btn btn-primary" href="<?= Url::to(['role/index']) ?>" role="button"><span
            class="glyphicon glyphicon-remove"></span> 取消</a>
    <?php ActiveForm::begin(['options' => ['id' => 'role','class' => 'form-horizontal']]) ?>
    <div class="form-group">
        <label for="role_name" class="col-md-2 control-label"><?= $labels['role_name'] ?></label>
        <div class="col-md-2">
            <input type="text" class="form-control" id="role_name" placeholder="请输入角色名称" name="Role[role_name]">
        </div>
    </div>
    <div class="form-group">
        <label for="role_desc" class="col-md-2 control-label"><?= $labels['role_desc'] ?></label>
        <div class="col-md-2">
            <textarea class="form-control" id="role_desc" rows="4" name="Role[role_desc]"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><?= $labels['role_auth'] ?></label>
        <div class="col-md-10">
            <div class="row">
                <label class="control-label col-md-1">
                    <input type="checkbox"> 信息中心
                </label>
                <div class="col-md-7">
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 文章管理
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 分类管理
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                </div>
            </div>
            <div class="row">
                <label class="control-label col-md-1">
                    <input type="checkbox"> 信息中心
                </label>
                <div class="col-md-7">
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 文章管理
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 分类管理
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                    <label class="control-label col-md-2">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 未审核信息
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
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
