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
				<li><a href="news_list.html" target="main-frame"><{$Think.session.username}></a></li>
				<li><a href="<{:U('Login/logout')}>" target="_top">退出</a></li>
			</ul>
		</div>
	</nav>
	<!-- /导航栏 -->
	<script src="__LIB__/jquery/jquery-1.11.3.js"></script>
	<script src="__LIB__/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>