<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>角色添加</title>
    <link rel="stylesheet" href="<?=Yii::getAlias('@admin/lib').'/bootstrap/css/bootstrap.css';?>">
</head>
<body>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="#">首页</a></li>
        <li>用户中心</li>
        <li class="active">角色添加</li>
    </ol>
    <a class="btn btn-primary" href="<?=Url::to(['role/index'])?>" role="button"><span class="glyphicon glyphicon-remove"></span> 取消</a>
    <form action="<?=Url::to(['role/add'])?>" class="form-horizontal" method="post">
        <div class="form-group">
            <label for="role_name" class="col-md-2 control-label">角色名称</label>
            <div class="col-md-2">
                <input type="text" class="form-control" id="role_name" placeholder="角色名称" name="role_name">
            </div>
        </div>
        <div class="form-group">
            <label for="role_desc" class="col-md-2 control-label">角色描述</label>
            <div class="col-md-2">
                <textarea class="form-control" id="role_desc" rows="4" name="role_desc"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">权限分配</label>
        </div>

        <volist name="auth_data" id="vo">
            <div class="form-group">
                <div class="checkbox">
                    <label class="col-md-2 control-label"><{$vo['0']['auth_name']}></label>
                    <label class="control-label"><input type="checkbox" >全选</label>
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox col-md-offset-2">
                    <volist name="vo" id="val">
                        <label class="checkbox-inline"><input type="checkbox" value="<{$val.auth_id}>" name="auth_list[]"><{$val.auth_name}></label>
                    </volist>
                </div>
            </div>
        </volist>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">提交</button>
                <button type="reset" class="btn btn-warning">重置</button>
            </div>
        </div>
    </form>
</div>
<script src="<?=Yii::getAlias('@admin/lib').'/jquery/jquery-1.11.3.js';?>"></script>
<script src="<?=Yii::getAlias('@admin/lib').'/bootstrap/js/bootstrap.min.js';?>"></script>
</body>
</html>
