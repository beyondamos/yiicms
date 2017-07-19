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
    <link rel="stylesheet" href="/admin/lib/bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li><a href="/">首页</a></li>
            <li>用户中心</li>
            <li class="active">角色管理</li>
        </ol>
        <a class="btn btn-primary" href="<?=Url::to(['role/add'])?>" role="button"><span class="glyphicon glyphicon-plus"></span> 角色添加</a>
        <?php if(Yii::$app->session->hasFlash('success')):?>
            <div class="alert alert-success" role="alert"><?php echo Yii::$app->session->getFlash('success');?></div>
        <?php endif;?>
        <?php if(Yii::$app->session->hasFlash('fail')):?>
            <div class="alert alert-danger" role="alert"><?php echo Yii::$app->session->getFlash('fail');?></div>
        <?php endif;?>
        <table class="table table-striped table-bordered">
            <tr class="text-center">
                <th class="text-center">角色id</th>
                <th class="text-center">角色名称</th>
                <th class="text-center">角色描述</th>
                <th class="text-center">操作</th>
            </tr>
            <?php foreach($role_data as $val):?>
                <tr>
                    <td class="text-center"><?php echo $val['role_id'];?></td>
                    <td class="text-center"><?php echo $val['role_name'];?></td>
                    <td class="text-center"><?php echo $val['role_desc'];?></td>
                    <?php if($val['role_id'] != 1):?> 
                        <td class="text-center">
                            <a class="btn btn-info" href="<?php echo Url::to(['role/edit', 'role_id' => $val['role_id']])?>" role="button">编辑</a>
                            <a class="btn btn-danger" href="<?php echo Url::to(['role/delete', 'role_id' => $val['role_id']]);?>" role="button">删除</a>
                        </td>
                    <?php endif;?>
                </tr>
            <?php endforeach;?>
        </table>
        
    </div>
    <script src="/admin/lib/jquery/jquery-1.11.3.js"></script>
    <script src="/admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
