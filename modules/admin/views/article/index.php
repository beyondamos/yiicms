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
  <title>文章列表</title>
  <link rel="stylesheet" href="/admin/lib/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/admin/css/main.css">
</head>
<body>
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li><a href="<?php echo Url::to(['index/main']);?>">首页</a></li>
      <li><a href="">信息中心</a></li>
      <li class="active">文章管理</li>
    </ol>
    <a class="btn btn-primary" href="<?=Url::to(['article/add']);?>" role="button"><span class="glyphicon glyphicon-plus"></span> 添加文章</a>

    <form class="form-inline pull-right" action="" method="get">
      <div class="form-group">
        <label for="exampleInputName2">文章分类</label>
        <select class="form-control" name="cateId">
            <?php foreach($categories as $key => $category) :?>
            <option value="<?php echo $key;?>" <?php echo ($key == $cateId) ? 'selected' : '';?> ><?php echo $category;?></option>
            <?php endforeach;?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail2">标题</label>
        <input type="text" class="form-control" id="exampleInputEmail2" name="title" value="<?php echo $searchTitle; ?>">
      </div>
      <button type="submit" class="btn btn-default">搜索</button>
    </form>
    <br /><br />
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
        <th class="text-center">标题</th>
        <th class="text-center">分类</th>
        <th class="text-center">标签</th>
        <th class="text-center">最后更新</th>
        <th class="text-center">操作</th>
      </tr>
      <?php foreach($articles as $article):?>

        <tr>
          <td class="text-center"><?php echo $article['id'];?></td>
          <td><a href="<?php echo Url::to(['/article/detail', 'id' => $article['id']]);?>" target="_blank"><?php echo $article['title'];?></a></td>
          <td class="text-center"><?php echo $article['catename']['name'];?></td>
          <td class="text-center"><?php echo $article['tags'];?></td>
          <td class="text-center"><?php echo date('Y-m-d H:i:s', $article['updatetime']);?></td>
          <td class="text-center">
            <a class="btn btn-info" href="<?php echo Url::to(['article/edit', 'id' => $article['id']]);?>" role="button">编辑</a>
            <a class="btn btn-warning" href="<?php echo Url::to(['article/examine', 'id' => $article['id']]);?>" role="button">草稿箱</a>
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