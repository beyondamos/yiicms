<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="<?=Yii::getAlias('@admin/lib').'/bootstrap/css/bootstrap.css';?>">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!-- 菜单 -->
			<div class="col-md-1 ">
				<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-file"></span> 信息中心&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
				<ul class="nav nav-pills nav-stacked">
					<li><a href="<?=Url::to(['article/index']);?>" target="main-frame">文章管理</a></li>
					<li><a href="<?=Url::to(['category/index'])?>" target="main-frame">分类管理</a></li>
					<li><a href="<?=Url::to(['article/unaudited'])?>" target="main-frame">未审核信息</a></li>
				</ul>	
				<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> 用户管理&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
				<ul class="nav nav-pills nav-stacked">
					<li><a href="<{:U('User/modifypersonal')}>" target="main-frame">修改个人资料</a></li>
					<li><a href="<?=Url::to(['user/index'])?>" target="main-frame">用户管理</a></li>
					<li><a href="<?=Url::to(['role/index'])?>" target="main-frame">角色管理</a></li>
				</ul>
				<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> 会员管理&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
				<ul class="nav nav-pills nav-stacked">
					<li><a href="member_list.html" target="main-frame">会员列表</a></li>
					<li><a href="member_group.html" target="main-frame">会员组管理</a></li>
				</ul>
				<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-signal"></span> 系统统计&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
				<ul class="nav nav-pills nav-stacked">
					<li><a href="">信息管理</a></li>
					<li><a href="">信息管理</a></li>
					<li><a href="">信息管理</a></li>
					<li><a href="">信息管理</a></li>
					<li><a href="">信息管理</a></li>
				</ul>
				<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-asterisk"></span> 系统管理&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
				<ul class="nav nav-pills nav-stacked">
					<li><a href="web_setup.html" target="main-frame">网站设置</a></li>
					<li><a href="basic_setup.html" target="main-frame">基本设置</a></li>
				</ul>
				<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-duplicate"></span> 数据管理&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
				<ul class="nav nav-pills nav-stacked">
					<li><a href="database_backups.html" target="main-frame">数据库备份</a></li>
					<li><a href="database_restore.html" target="main-frame">数据库还原</a></li>
					<li><a href="database_optimize.html" target="main-frame">数据表优化</a></li>
					<li><a href="database_sql.html" target="main-frame">SQL查询</a></li>
				</ul>
			</div>
			<!-- /菜单 -->
		</div>
	</div>
	<script src="__LIB__/jquery/jquery-1.11.3.js"></script>
	<script src="__LIB__/bootstrap/js/bootstrap.min.js"></script>
	<script src="__JS__/left.js"></script>
</body>
</html>