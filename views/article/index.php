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
    <link rel="stylesheet" href="<?=Yii::getAlias('@css').'/main.css';?>">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse"  role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">DayDayLearn</a>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
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
        </div>
    </div><!-- /.container -->
</nav>

<div class="container clearfix">
    <div class="row">
        <!--左侧开始-->
        <div class="col-md-8">
            <!-- 路径导航 -->
            <ol class="breadcrumb">
                <li><a href="/">首页</a></li>
                <li><a href="#">PHP</a></li>
                <li class="active">这是测试文章</li>
            </ol>

            <div class="content-container">
                <div class="page-header">
                    <h1 class="h2">这是一篇测试文章</h1>
                    <div class="article-meta">
                        <span class="item">2017-05-22</span>
                        <span class="item">作者：小名叫小明</span>
                        <span class="item">分类：<a href="">PHP</a></span>
                        <span class="item">浏览量：500</span>
                    </div>
                </div>
                <p>有一句话：我们喜欢简单，因为上帝创造宇宙的时候，他定下来的规则也非常简单。很多物理学家说我们发现宇宙的规律是很简单的，既然宇宙的规律都这么简单，我们为什么要把很多事情搞复杂化?</p>
                <p>为什么说产品经理是站在上帝身边的人?一是我想奉承一下产品经理，另外一点是觉得大家很像上帝。上帝是一个什么样的人?上帝是一个建立了简单的规则，然后让这个世界演化的人。</p>
                <p><img src="<?php echo Yii::getAlias('@image').'/052201.jpg';?>" alt=""></p>
                <p>今天大家只关注腾讯更新iOS版，推出了看一看、搜一搜两个功能，认为相当于德苏、德美直接开战。其实昨天另一个新闻更值得玩味：腾讯最新财报显示，微信月度活跃用户即将突破 10 亿。</p>
                <p>当然不是都被腾讯抢光的。目前中国互联网的流量大户，主要是BAT+京东+网易+微博+四小花旦，四小花旦就是小米+滴滴+新美大+今日头条。这 10 家公司基本占据了中国互联网产品刚需、高频两个最重要的市场维度。帝国主义寡头已然形成。</p>
                <p>当用户增量市场越来越小的时候，只能调转枪口，向存量市场进攻。谁的地盘大，就搞谁。中国互联网的第一次世界大战就是这么爆发的。</p>
                <p><img src="<?php echo Yii::getAlias('@image').'/052202.jpg';?>" alt=""></p>
                <p>2010 年周鸿祎为什么单挑马化腾?那一年，中国基于PC互联网的网民数量在环比增幅上，第一次开始明显下降，这也就意味着，PC互联网的人口红利正式进入衰退期。</p>
                <p>2010 年周鸿祎为什么单挑马化腾?那一年，中国基于PC互联网的网民数量在环比增幅上，第一次开始明显下降，这也就意味着，PC互联网的人口红利正式进入衰退期。</p>
                <p>2010 年周鸿祎为什么单挑马化腾?那一年，中国基于PC互联网的网民数量在环比增幅上，第一次开始明显下降，这也就意味着，PC互联网的人口红利正式进入衰退期。</p>
            </div>

            <span class="glyphicon glyphicon-tags"></span> 标签：<a href="" class="tag">SEO</a><a href="" class="tag">科技</a><a href="" class="tag">军事</a>

            <ul class="page list-group">
                <li class="list-group-item">上一篇：<a href="#">PC互联网的人口红利正式进入衰退期</a></li>
                <li class="list-group-item">下一篇：<a href="#">物理学家说我们发现宇宙的规律是很简单的</a></li>
            </ul>

            <div class="recommend">
            <div class="page-header">
                <span>你可能感兴趣的:</span>
            </div>
            <div class="thumbnail col-md-3">
                <img src="<?php echo Yii::getAlias('@image').'/052202.jpg';?>" alt="中国基于PC互联网的网民">
                <h5><a href="">物理学家说我们发现宇宙的规律</a></h5>
            </div>
            <div class="thumbnail col-md-3">
                <img src="<?php echo Yii::getAlias('@image').'/052202.jpg';?>" alt="中国基于PC互联网的网民">
                <h5><a href="">物理学家说我们发现宇宙的规律</a></h5>
            </div>
            <div class="thumbnail col-md-3">
                <img src="<?php echo Yii::getAlias('@image').'/052202.jpg';?>" alt="中国基于PC互联网的网民">
                <h5><a href="">物理学家说我们发现宇宙的规律</a></h5>
            </div>
            <div class="thumbnail col-md-3">
                <img src="<?php echo Yii::getAlias('@image').'/052202.jpg';?>" alt="中国基于PC互联网的网民">
                <h5><a href="">物理学家说我们发现宇宙的规律</a></h5>
            </div>
            <div class="thumbnail col-md-3">
                <img src="<?php echo Yii::getAlias('@image').'/052202.jpg';?>" alt="中国基于PC互联网的网民">
                <h5><a href="">物理学家说我们发现宇宙的规律</a></h5>
            </div>
            </div>

        </div><!--左侧结束-->

        <!--右侧开始-->
        <div class="col-md-3 col-md-offset-1">
            <!--广告位置-->
            <div class="adv">
                <div class="thumbnail"><a href=""><img src="<?=Yii::getAlias('@image').'/1.jpg'?>" alt=""></a></div>
            </div>
            <!--热门文章排行-->
            <div class="page-header">
                <h4>热门文章排行</h4>
            </div>
            <ol class="hot-article">
                <li><a href="">热门文章排行热门文章排行热门文章排行热门文章排行</a></li>
                <li><a href="">热门文章排行热门文章排行</a></li>
                <li><a href="">热门文章排行热门文章排行</a></li>
                <li><a href="">热门文章排行热门文章排行</a></li>
                <li><a href="">热门文章排行热门文章排行</a></li>
                <li><a href="">热门文章排行热门文章排行热门文章排行热门文章排行</a></li>
                <li><a href="">热门文章排行热门文章排行</a></li>
                <li><a href="">热门文章排行热门文章排行</a></li>
                <li><a href="">热门文章排行热门文章排行</a></li>
                <li><a href="">热门文章排行热门文章排行</a></li>
            </ol>
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
            <a href="" class="tag">php</a>
            <a href="" class="tag">mysqkl</a>
            <a href="" class="tag">mysql</a>
            <a href="" class="tag">我的</a>
            <a href="" class="tag">php</a>
            <a href="" class="tag">linux</a>

        </div>
        <!--右侧结束-->
    </div> <!-- 主体部分 -->
</div>

<footer class="container-fluid clearfix footer">
    <p class="text-center">COPYRIGHT 2017 DayDayLearn. ALL RIGHTS RESERVED.</p>
    <p class="text-center">THEME KRATOS MADE BY VTROIS </p>
    <p class="text-center">苏ICP备15027164号-1</p>
    <p class="text-center">苏公网安备 32128202000324号</p>
</footer><!--底部-->

<script src="<?=Yii::getAlias('@lib').'/jquery/jquery-1.11.3.js';?>"></script>
<script src="<?=Yii::getAlias('@lib').'/bootstrap/js/bootstrap.min.js'?>"></script>
</body>
</html>
