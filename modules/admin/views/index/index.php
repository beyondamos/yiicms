<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>后台首页</title>
    <frameset rows="76,*" framespacing="0" border="0">
        <frame src="<?=Url::to(['index/head'])?>" id="header-frame" name="header-frame" frameborder="no" scrolling="no">
        <frameset cols="180, *" framespacing="0" border="0" id="frame-body">
            <frame src="<?=Url::to(['index/left'])?>" id="menu-frame" name="menu-frame" frameborder="yes" scrolling="yes">
            <frame src="<?=Url::to(['index/main'])?>" id="main-frame" name="main-frame" frameborder="no" scrolling="yes">
        </frameset>
    </frameset>
</head>
</html>
