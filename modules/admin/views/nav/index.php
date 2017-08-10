<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>导航列表</title>
    <link rel="stylesheet" href="/admin/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/admin/css/main.css">
</head>
<body>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li><a href="./main.html">首页</a></li>
            <li><a href="#">系统管理</a></li>
            <li class="active">导航管理</li>
        </ol>
        <a class="btn btn-primary" href="<?=Url::to(['nav/add']);?>" role="button"><span class="glyphicon glyphicon-plus"></span> 添加导航</a>
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
        <th class="text-center">编号</th>
        <th class="text-center">导航名称</th>
        <th class="text-center">URL</th>
        <th class="text-center">排序</th>
        <th class="text-center">导航级别</th>
        <th class="text-center">打开方式</th>
        <th class="text-center">状态</th>
        <th class="text-center">操作</th>
    </tr>
    <?php foreach($navs as $nav):?>
    <tr>
        <td class="text-center"><?php echo $nav['id'];?></td>
        <td><a href="<?php echo $nav['nav_url'];?>" target="_blank"><?php echo str_repeat('----', $nav['level']*2).$nav['nav_name'];?></a></td>
        <td class="text-center"> <a href="<?php echo $nav['nav_url'];?>" target="_blank"> <?php echo $nav['nav_url'];?></a></td>
        <td class="text-center"><?php echo $nav['sort'];?></td>
        <td class="text-center"><?php echo ($nav['level']+1).'级导航';?></td>
        <td class="text-center"><?php echo $nav['is_blank'] == 0 ? '本页面打开' : '新窗口打开';?></td>
        <td class="text-center"><?php echo $nav['status'] == 0 ? '禁用' : '生效';?></td>
        <td class="text-center">
            <a class="btn btn-info" href="<?php echo Url::to(['nav/edit', 'id' => $nav['id']]);?>" role="button">编辑</a>
            <a class="btn btn-danger" href="<?php echo Url::to(['nav/delete', 'id' => $nav['id']]);?>" role="button">删除</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>
</div>
<script src="/admin/lib/jquery/jquery-1.11.3.js"></script>
<script src="/admin/lib/bootstrap/js/bootstrap.min.js"></script>
</html>