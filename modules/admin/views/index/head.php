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
	<link rel="stylesheet" href="/admin/lib/bootstrap/css/bootstrap.css">
</head>
<body>
	<!-- <!-- 导航栏 -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="" class="navbar-brand">DayDayLearn</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="news_list.html" target="main-frame">欢迎回来，<?php echo $this->params['user_info']['nickname'];?></a></li>
				<li><a href="<?php echo Url::home();?>" target="_blank" >网站首页</a></li>
				<li><a href="<?php echo Url::to(['login/logout']);?>" target="_top">退出</a></li>
			</ul>
		</div>
	</nav>
	<!-- /导航栏 -->
	<script src="/admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>