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
    <link rel="stylesheet" href="<?=Yii::getAlias('@admin/lib').'/bootstrap/css/bootstrap.css';?>">
    <link rel="stylesheet" href="__CSS__/main.css">
</head>
<body>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="./main.html">首页</a></li>
        <li><a href="#">信息中心</a></li>
        <li class="active">文章管理</li>
    </ol>
    <a class="btn btn-primary" href="<?=Url::to(['article/add']);?>" role="button"><span class="glyphicon glyphicon-plus"></span> 添加文章</a>
    <?php if(Yii::$app->session->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong><?php echo Yii::$app->session->getFlash('success');?></strong>
    </div>
    <?php endif;?>
    <?php if(Yii::$app->session->hasFlash('fail')):?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong><?php echo Yii::$app->session->getFlash('fail');?></strong>
    </div>
    <?php endif;?>
        <table class="table table-bordered table-striped table-condensed table-hover">
            <tr>
                <th class="text-center">选择</th>
                <th class="text-center">编号</th>
                <th class="text-center">标题</th>
                <th class="text-center">分类</th>
                <th class="text-center">最后更新</th>
                <th class="text-center">操作</th>
            </tr>
            <volist name="article_info" id="vo">
                <tr>
                    <td class="text-center"><input type="checkbox" name="article_id[]" value="<{$vo.article_id}>"></td>
                    <td class="text-center"><{$vo.article_id}></td>
                    <td><{$vo.title}></td>
                    <td class="text-center"><{$vo.cate_name}></td>
                    <td class="text-center"><{:date('Y-m-d H:i:s',$vo['newstime'])}></td>
                    <td class="text-center">
                        <a class="btn btn-info" href="<{:U('edit', array('article_id' => $vo['article_id']))}>" role="button">编辑</a>
                        <a class="btn btn-warning" href="<{:U('unCheck',array('article_id'=>$vo['article_id']))}>" role="button">回收站</a>
                    </td>
                </tr>
            </volist>
        </table>
</div>
<script src="<?=Yii::getAlias('@admin/lib').'/jquery/jquery-1.11.3.js';?>"></script>
<script src="<?=Yii::getAlias('@admin/lib').'/bootstrap/js/bootstrap.min.js';?>"></script>
</html>