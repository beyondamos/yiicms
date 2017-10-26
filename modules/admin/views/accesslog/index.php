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
<title>访问日志</title>
<link rel="stylesheet" href="/admin/lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="/admin/css/main.css">
</head>
<body>
<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="<?=Url::to(['index/main'])?>">首页</a></li>
    <li><a href="#">系统统计</a></li>
    <li class="active">访问记录</li>
  </ol>
  <table class="table table-bordered table-striped table-condensed table-hover">
    <tr>
      <th class="text-center">编号</th>
      <th class="text-center">访问页面</th>
      <th class="text-center">来源</th>
      <th class="text-center">IP</th>
      <th class="text-center">时间</th>
      <th class="text-center">操作</th>
    </tr>
    <?php foreach($logs as $log):?>
      <tr>
        <td class="text-center"><?php echo $log['id'];?></td>
        <td><a href="<?php echo $log['url'];?>" target="_blank"><?php echo $log['url'];?></a></td>
        <td class="text-center"><a href="<?php echo $log['referrer'];?>" target="_blank"><?php echo $log['referrer'];?></a></td>
        <td class="text-center"><?php echo long2ip($log['ip']);?></td>
        <td class="text-center"><?php echo date('Y-m-d H:i:s', $log['visittime']);?></td>
        <td class="text-center">
          <a class="btn btn-danger" href="<?php echo Url::to(['accesslog/delete', 'id' => $log['id']]);?>" role="button">删除</a>
        </td>
      </tr>
    <?php endforeach;?>
  </table>
  <?php
  echo LinkPager::widget([
    'pagination' => $pagination,
    'firstPageLabel' => '首页',
    'prevPageLabel' => '上一页',
    'nextPageLabel' => '下一页',
    'lastPageLabel' => '末页',
    ]);
  ?>
  </div>
  <script src="/admin/lib/jquery/jquery-1.11.3.js"></script>
  <script src="/admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>