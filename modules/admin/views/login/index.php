<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台登录</title>
    <link rel="stylesheet" href="<?=Yii::getAlias('@admin/lib').'/bootstrap/css/bootstrap.css';?>">
</head>
<body>
<div class="container-fluid">
    <div class="col-md-offset-4 col-md-3">
        <div class="row" >
        <h3 class="page-header">DayDayLearn后台登录</h3>
        </div>
        <div class="row">
        <form action="<?=Url::to(['login/index']);?>" class="form-horizontal " method="post">
            <div class="form-group">
                <label for="username" class="col-md-2 control-label">用户名</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-2 control-label">密码</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="password" name="password" placeholder="请输入用户密码">
                </div>
            </div>
            <div class="form-group">
                <label for="verify" class="col-md-2 control-label">验证码</label>
                <div class="col-md-6">
                    <div class="col-md-6 pull-left" >
                    <input type="text" class="form-control" id="verify" name="verify" placeholder="验证码">
                    </div>
                    <img class="pull-right" src="<?=Yii::getAlias('@admin').'/images/verify.png'?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-6">
                    <input class="btn btn-info" type="submit" value="登录" >
                    <input class="btn btn-danger" type="reset" value="重置">
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<script src="<?=Yii::getAlias('@admin/lib').'/jquery/jquery-1.11.3.js';?>"></script>
<script src="<?=Yii::getAlias('@admin/lib').'/bootstrap/js/bootstrap.min.js';?>"></script>
</body>
</html>