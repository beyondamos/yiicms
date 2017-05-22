<?php
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>DayDayLearn</title>
    <link href="<?=Yii::getAlias('@lib').'/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?=Yii::getAlias('@css').'/index.css';?>">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default ">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">DayDayLearn</a>
        </div>
        <!--        <div class="collapse navbar-collapse">-->
        <ul class="nav navbar-nav">
            <li><a href="">PHP</a></li>
            <li><a href="">Mysql</a></li>
            <li><a href="">Linux</a></li>
            <li><a href="">Html</a></li>
            <li><a href="">Javascript</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>
        <!--        </div>-->
    </div><!-- /.container -->
</nav>

<div class="container clearfix">
    <div class="row">
        <!--左侧开始-->
        <div class="col-md-8">
            <!--单篇文章开始-->
            <div class="article-box row clearfix">
                <div class="col-md-4">
                    <a href="/" class="thumbnail"><img src="<?=Yii::getAlias('@image').'/1.jpg'?>" alt=""></a>
                </div>
                <div class="caption">
                    <h3><a href="">情绪不佳时的说话方式,最见素养</a></h3>
                    <p>说话是一门艺术。情绪好的时候，做到说话得体、不失风度，并不是件困难的事。 可是当情绪不佳时，许多人只图一时的宣泄， ...</p>
                    <p>分类: <span class="label label-info"><a href="#" class="">PHP</a></span></p>
                    <p class="tag">标签：<span class="label label-default">Success</span><span class="label label-default">Success</span><span class="label label-default">Success</span></p>
                    <span class="clearfix"><span class="glyphicon glyphicon-time"></span> 2017-05-16</span>
                </div>
            </div> <!-- /article-box --><!--单篇文章结束-->
            <!--单篇文章开始-->
            <div class="article-box row clearfix">
                <div class="col-md-4">
                    <a href="/" class="thumbnail"><img src="<?=Yii::getAlias('@image').'/1.jpg'?>" alt=""></a>
                </div>
                <div class="caption">
                    <h3><a href="">情绪不佳时的说话方式,最见素养</a></h3>
                    <p>说话是一门艺术。情绪好的时候，做到说话得体、不失风度，并不是件困难的事。 可是当情绪不佳时，许多人只图一时的宣泄， ...</p>
                    <p>分类: <span class="label label-info"><a href="#" class="">PHP</a></span></p>
                    <p class="tag">标签：<span class="label label-default">Success</span><span class="label label-default">Success</span><span class="label label-default">Success</span></p>
                    <span class="clearfix"><span class="glyphicon glyphicon-time"></span> 2017-05-16</span>
                </div>
            </div> <!-- /article-box --><!--单篇文章结束-->
            <!--单篇文章开始-->
            <div class="article-box row clearfix">
                <div class="col-md-4">
                    <a href="/" class="thumbnail"><img src="<?=Yii::getAlias('@image').'/1.jpg'?>" alt=""></a>
                </div>
                <div class="caption">
                    <h3><a href="">情绪不佳时的说话方式,最见素养</a></h3>
                    <p>说话是一门艺术。情绪好的时候，做到说话得体、不失风度，并不是件困难的事。 可是当情绪不佳时，许多人只图一时的宣泄， ...</p>
                    <p>分类: <span class="label label-info"><a href="#" class="">PHP</a></span></p>
                    <p class="tag">标签：<span class="label label-default">Success</span><span class="label label-default">Success</span><span class="label label-default">Success</span></p>
                    <span class="clearfix"><span class="glyphicon glyphicon-time"></span> 2017-05-16</span>
                </div>
            </div> <!-- /article-box --><!--单篇文章结束-->
        </div><!--左侧结束-->



        <!--右侧开始-->
        <div class="col-md-3 col-md-offset-1">
            <!--广告位置-->
            <div class="adv">
                <div class="thumbnail"><a href=""><img src="<?=Yii::getAlias('@image').'/1.jpg'?>" alt=""></a></div>
            </div>
            <!--大家都在看-->
            <div class="page-header">
                <h4>大家都在看</h4>
            </div>
            <div class=" row clearfix">
                <div class="col-md-7">
                    <a href="/" class="thumbnail"><img src="<?=Yii::getAlias('@image').'/1.jpg'?>" alt=""></a>
                </div>
                <p>情绪不佳时的说话方式,最见素养</p>
            </div>
            <div class=" row clearfix">
                <div class="col-md-7">
                    <a href="/" class="thumbnail"><img src="<?=Yii::getAlias('@image').'/1.jpg'?>" alt=""></a>
                </div>
                <p>情绪不佳时的说话方式,最见素养</p>
            </div>

            <div class="page-header">
                <h4>热门话题</h4>
            </div>
            <div class="tags">
                <a href="">php</a>
                <a href="">mysqkl</a>
                <a href="">mysql</a>
                <a href="">我的</a>
                <a href="">php</a>
                <a href="">linux</a>
            </div>

        </div>
        <!--右侧结束-->
    </div> <!-- 主体部分 -->
</div>



<script src="<?=Yii::getAlias('@lib').'/jquery/jquery-1.11.3.js';?>"></script>
<script src="<?=Yii::getAlias('@lib').'/bootstrap/js/bootstrap.min.js'?>"></script>
</body>
</html>
