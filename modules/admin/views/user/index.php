<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>用户列表</title>
    <link rel="stylesheet" href="<?=Yii::getAlias('@admin/lib').'/bootstrap/css/bootstrap.css';?>">
</head>
<body>
<?php $this->beginBody() ?>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li><a href="#">首页</a></li>
            <li>用户中心</li>
            <li class="active">用户管理</li>
        </ol>
        <a class="btn btn-primary" href="<?=Url::to(['user/add'])?>" role="button"><span class="glyphicon glyphicon-plus"></span> 用户添加</a>
        <?php if (Yii::$app->session->hasFlash('success')) : ?>
            <div class="alert alert-success" role="alert"><?php echo Yii::$app->session->getFlash('success');?></div>
        <?php endif;?>

        <table class="table table-striped table-bordered">
            <tr class="text-center">
                <th class="text-center">用户id</th>
                <th class="text-center">用户名称</th>
                <th class="text-center">所属角色</th>
                <th class="text-center">创建时间</th>
                <th class="text-center">操作</th>
            </tr>
            <?php foreach($users as $user):?>
                <tr>
                    <td class="text-center"><?php echo $user['id'];?></td>
                    <td class="text-center"><?php echo $user['username'];?></td>
                    <td class="text-center"><?php echo $user['role']['role_name'];?></td>
                    <td class="text-center"><?php echo date('Y-m-d H:i:s', $user['createtime']);?></td>
                    <td class="text-center">
                        <a class="btn btn-info" href="<?php echo Url::to(['user/edit', 'id' => $user['id'], 'page' => $page]);?>" role="button">编辑</a>
                        <?php if($user['id'] != 1):?>
                            <a class="btn btn-danger" href="<?php echo Url::to(['user/delete', 'id' => $user['id']]);?>" role="button">删除</a>
                        <?php endif;?>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?php echo LinkPager::widget([
            'pagination' => $pagination,
            'firstPageLabel' => '首页',
            'prevPageLabel' => '上一页',
            'nextPageLabel' => '下一页',
            'lastPageLabel' => '末页',
        ]);?>
    </div>
    <script src="<?=Yii::getAlias('@admin/lib').'/jquery/jquery-1.11.3.js';?>"></script>
    <script src="<?=Yii::getAlias('@admin/lib').'/bootstrap/js/bootstrap.min.js';?>"></script>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>