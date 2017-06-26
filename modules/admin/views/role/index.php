<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>角色列表</title>
    <link rel="stylesheet" href="<?=Yii::getAlias('@admin/lib').'/bootstrap/css/bootstrap.css';?>">
</head>
<body>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li><a href="#">首页</a></li>
            <li>用户中心</li>
            <li class="active">角色管理</li>
        </ol>
        <a class="btn btn-primary" href="<?=Url::to(['role/add'])?>" role="button"><span class="glyphicon glyphicon-plus"></span> 角色添加</a>
        <?php if(Yii::$app->session->hasFlash('success')):?>
            <div class="alert alert-success" role="alert">添加角色信息成功</div>
        <?php endif;?>
        <table class="table table-striped table-bordered">
            <tr class="text-center">
                <th class="text-center">角色id</th>
                <th class="text-center">角色名称</th>
                <th class="text-center">角色描述</th>
                <th class="text-center">操作</th>
            </tr>
            <volist name="role_data" id="vo">
                <tr>
                    <td class="text-center"><{$vo.role_id}></td>
                    <td class="text-center"><{$vo.role_name}></td>
                    <td class="text-center"><{$vo.role_desc}></td>
                    <if condition="$vo['role_id'] != 1">
                        <td class="text-center">
                            <a class="btn btn-info" href="<{:U('Role/edit',array('role_id' => $vo['role_id']))}>" role="button">编辑</a>
                            <a class="btn btn-danger" href="<{:U('Role/delete',array('role_id' => $vo['role_id']))}>" role="button">删除</a>
                        </td>
                    </if>
                </tr>
            </volist>
        </table>
    </div>
    <script src="<?=Yii::getAlias('@admin/lib').'/jquery/jquery-1.11.3.js';?>"></script>
    <script src="<?=Yii::getAlias('@admin/lib').'/bootstrap/js/bootstrap.min.js'?>"></script>
</body>
</html>
