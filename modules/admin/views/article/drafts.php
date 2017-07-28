<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文章列表</title>
    <link rel="stylesheet" href="/admin/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/admin/css/main.css">
</head>
<body>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="./main.html">首页</a></li>
        <li><a href="#">信息中心</a></li>
        <li class="active">文章管理</li>
    </ol>
    <a class="btn btn-primary" href="<?=Url::to(['article/add']);?>" role="button"><span class="glyphicon glyphicon-plus"></span> 添加文章</a>
    <form id="checkform" method="post" action="">
        <table class="table table-bordered table-striped table-condensed table-hover">
            <tr>
                <th class="text-center">编号</th>
                <th class="text-center">标题</th>
                <th class="text-center">分类</th>
                <th class="text-center">标签</th>
                <th class="text-center">最后更新</th>
                <th class="text-center">操作</th>
            </tr>
    
            <?php foreach($articles as $article):?>
                <tr>
                    <td class="text-center"><?php echo $article['id'];?></td>
                    <td><?php echo $article['title'];?></td>
                    <td class="text-center"><?php echo $article['catename']['name'];?></td>
                    <td class="text-center"><?php echo $article['tags'];?></td>
                    <td class="text-center"><?php echo date('Y-m-d H:i:s', $article['updatetime']);?></td>
                    <td class="text-center">
                        <a class="btn btn-info" href="<?php echo Url::to(['article/edit', 'id' => $article['id']]);?>" role="button">编辑</a>
                        <a class="btn btn-warning" href="<?php echo Url::to(['article/examine', 'id' => $article['id']]);?>" role="button">审核</a>
                        <a class="btn btn-danger" href="<?php echo Url::to(['article/delete', 'id' => $article['id']]);?>" role="button">永久删除</a>
                    </td>
                </tr>
            <?php endforeach;?>

        </table>
    </form>
</div>
<script src="/admin/lib/jquery/jquery-1.11.3.js';?>"></script>
<script src="/admin/lib/bootstrap/js/bootstrap.min.js';?>"></script>
</html>