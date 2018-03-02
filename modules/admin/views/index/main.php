<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>后台首页</title>
	<link rel="stylesheet" href="/admin/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/admin/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<div class="page-header">
			<h3>我的状态</h3>
		</div>
		<p>登录者:  <strong><?php echo $this->params['user_info']['nickname'];?></strong>   ，所属用户组:  <strong><?php echo $this->params['user_info']['role_name'];?></strong></p>
		<p>这是您第 <strong><?php echo $this->params['user_info']['logintimes'];?></strong> 次登录，上次登录时间： <strong><?php echo $this->params['user_info']['lastlogintime'];?></strong> ，上次登录IP： <strong><?php echo $this->params['user_info']['lastloginip'];?></strong></p>
		<a class="btn btn-info" href="<?=Url::to(['user/password']);?>" role="button">修改密码</a>
		<div class="page-header">
			<h3>系统信息</h3>
		</div>
		<table class="table table-striped table-bordered text-center">
			<tr><td>服务器操作系统</td><td><?PHP echo PHP_OS; ?></td><td>PHP版本</td><td><?PHP echo PHP_VERSION; ?></td></tr>
			<tr><td>Mysql版本</td><td><?php echo 5.6; ?></td><td>安全模式</td><td>否</td></tr>
			<tr><td>Socket 支持:</td><td>是</td><td>Web 服务器</td><td><?php echo $_SERVER['SERVER_SOFTWARE']?></td></tr>
			<tr><td>GD 版本</td><td><?php echo gd_info()['GD Version'];?></td><td>时区设置</td><td><?php echo date_default_timezone_get();?></td></tr>
			<tr><td>上传文件</td><td><?php echo get_cfg_var ("upload_max_filesize");?></td><td>程序编码</td><td>UTF-8</td></tr>
		</table>
	</div>
	<script src="/admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>