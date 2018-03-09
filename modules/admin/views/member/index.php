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
    <title>会员列表</title>
    <link rel="stylesheet" href="/admin/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/admin/css/main.css">
</head>
<body>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li><a href="<?php echo Url::to(['index/main']);?>">首页</a></li>
            <li><a href="<?php echo Url::to(['member/index']);?>">会员管理</a></li>
            <li class="active">会员列表</li>
        </ol>
        <!-- <a class="btn btn-primary" href="<?=Url::to(['member/add']);?>" role="button"><span class="glyphicon glyphicon-plus"></span> 添加会员</a> -->
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
        <th class="text-center">会员名称</th>
        <th class="text-center">邮箱</th>
        <th class="text-center">注册时间</th>
        <th class="text-center">最后登录时间</th>
        <th class="text-center">操作</th>
    </tr>
    <?php foreach($members as $member):?>

    <tr>
        <td class="text-center"><?php echo $member['id'];?></td>
        <td><a href="<?php echo Url::to(['/member/index', 'id' => $member['id']]);?>" target="_blank"><?php echo $member['username'];?></a></td>
        <td class="text-center"><?php echo $member['email'];?></td>
        <td class="text-center"><?php echo date('Y-m-d', $member['registertime']);?></td>
        <td class="text-center"><?php echo date('Y-m-d H:i:s', $member['lastlogintime']);?></td>
        <td class="text-center">
            <a class="btn btn-info" href="<?php echo Url::to(['member/edit', 'id' => $member['id']]);?>" role="button">编辑</a>
            <a class="btn btn-warning" href="<?php echo Url::to(['member/examine', 'id' => $member['id']]);?>" role="button">禁用</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>
<?php
  // echo LinkPager::widget([
  //           'pagination' => $pagination,
  //           'firstPageLabel' => '首页',
  //           'prevPageLabel' => '上一页',
  //           'nextPageLabel' => '下一页',
  //           'lastPageLabel' => '末页',
  //   ]);
?>
</div>
<script src="/admin/lib/jquery/jquery-1.11.3.js"></script>
<script src="/admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>