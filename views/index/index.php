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
    <link href="<?= Yii::getAlias('@lib') . '/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= Yii::getAlias('@css') . '/main.css'; ?>">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar  navbar-inverse" role="navigation">
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
</nav> <!--导航栏结束-->

<div class="container clearfix">
    <!--左侧开始-->
    <div class="col-md-8">

        <div class="row headlines">
            <div class="col-md-7">
                <div id="myCarousel" class="carousel slide">
                    <!-- 轮播（Carousel）指标 -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- 轮播（Carousel）项目 -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive center-block" src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt="First slide">
                            <div class="carousel-caption">情绪不佳时的说话方式</div>
                        </div>
                        <div class="item">
                            <img class="img-responsive center-block" src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt="Second slide">
                            <div class="carousel-caption">情绪不佳时的说话方式</div>
                        </div>
                        <div class="item">
                            <img class="img-responsive center-block" src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt="Third slide">
                            <div class="carousel-caption">情绪不佳时的说话方式</div>
                        </div>
                    </div>
                    <!-- 轮播（Carousel）导航 -->
                    <a class="carousel-control left" href="#myCarousel"
                       data-slide="prev">&lsaquo;
                    </a>
                    <a class="carousel-control right" href="#myCarousel"
                       data-slide="next">&rsaquo;
                    </a>
                </div>
            </div>
            <div class="col-md-5">

                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">情绪不佳时的说话方式,最见素养</h4>
                        <p class="list-group-item-text">不失风度，并不是件困难的事。 可是当</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">情绪不佳时的说话方式,最见素养</h4>
                        <p class="list-group-item-text">不失风度，并不是件困难的事。 可是当</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">情绪不佳时的说话方式,最见素养</h4>
                        <p class="list-group-item-text">不失风度，并不是件困难的事。 可是当</p>
                    </a>
                </div>

            </div>
        </div>
        <!--单篇文章开始-->
        <div class="page-header">
            <span class="h4">最新发布</span>
        </div>
        <div class="article-box row clearfix">
            <div class="col-md-4">
                <a href="/" class="thumbnail"><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a>
            </div>
            <div class="caption">
                <h3><a href="">情绪不佳时的说话方式,最见素养</a></h3>
                <p>说话是一门艺术。情绪好的时候，做到说话得体、不失风度，并不是件困难的事。 可是当情绪不佳时，许多人只图一时的宣泄， ...</p>
                <p>分类:<span><a href="#" class="">PHP</a></span>&nbsp;&nbsp;&nbsp;<span>2017-05-16</span></p>
                <p>标签: <a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a>
                </p>
            </div>
        </div> <!-- /article-box --><!--单篇文章结束-->
        <!--单篇文章开始-->
        <div class="article-box row clearfix">
            <div class="col-md-4">
                <a href="/" class="thumbnail"><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a>
            </div>
            <div class="caption">
                <h3><a href="">情绪不佳时的说话方式,最见素养</a></h3>
                <p>说话是一门艺术。情绪好的时候，做到说话得体、不失风度，并不是件困难的事。 可是当情绪不佳时，许多人只图一时的宣泄， ...</p>
                <p>分类:<span><a href="#" class="">PHP</a></span>&nbsp;&nbsp;&nbsp;<span>2017-05-16</span></p>
                <p>标签: <a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a>
                </p>
            </div>
        </div> <!-- /article-box --><!--单篇文章结束-->
        <!--单篇文章开始-->
        <div class="article-box row clearfix">
            <div class="col-md-4">
                <a href="/" class="thumbnail"><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a>
            </div>
            <div class="caption">
                <h3><a href="">情绪不佳时的说话方式,最见素养</a></h3>
                <p>说话是一门艺术。情绪好的时候，做到说话得体、不失风度，并不是件困难的事。 可是当情绪不佳时，许多人只图一时的宣泄， ...</p>
                <p>分类:<span><a href="#" class="">PHP</a></span>&nbsp;&nbsp;&nbsp;<span>2017-05-16</span></p>
                <p>标签: <a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a>
                </p>
            </div>
        </div> <!-- /article-box --><!--单篇文章结束-->
        <!--单篇文章开始-->
        <div class="article-box row clearfix">
            <div class="col-md-4">
                <a href="/" class="thumbnail"><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a>
            </div>
            <div class="caption">
                <h3><a href="">情绪不佳时的说话方式,最见素养</a></h3>
                <p>说话是一门艺术。情绪好的时候，做到说话得体、不失风度，并不是件困难的事。 可是当情绪不佳时，许多人只图一时的宣泄， ...</p>
                <p>分类:<span><a href="#" class="">PHP</a></span>&nbsp;&nbsp;&nbsp;<span>2017-05-16</span></p>
                <p>标签: <a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a>
                </p>
            </div>
        </div> <!-- /article-box --><!--单篇文章结束-->
        <!--单篇文章开始-->
        <div class="article-box row clearfix">
            <div class="col-md-4">
                <a href="/" class="thumbnail"><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a>
            </div>
            <div class="caption">
                <h3><a href="">情绪不佳时的说话方式,最见素养</a></h3>
                <p>说话是一门艺术。情绪好的时候，做到说话得体、不失风度，并不是件困难的事。 可是当情绪不佳时，许多人只图一时的宣泄， ...</p>
                <p>分类:<span><a href="#" class="">PHP</a></span>&nbsp;&nbsp;&nbsp;<span>2017-05-16</span></p>
                <p>标签: <a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a>
                </p>
            </div>
        </div> <!-- /article-box --><!--单篇文章结束-->
        <!--单篇文章开始-->
        <div class="article-box row clearfix">
            <div class="col-md-4">
                <a href="/" class="thumbnail"><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a>
            </div>
            <div class="caption">
                <h3><a href="">情绪不佳时的说话方式,最见素养</a></h3>
                <p>说话是一门艺术。情绪好的时候，做到说话得体、不失风度，并不是件困难的事。 可是当情绪不佳时，许多人只图一时的宣泄， ...</p>
                <p>分类:<span><a href="#" class="">PHP</a></span>&nbsp;&nbsp;&nbsp;<span>2017-05-16</span></p>
                <p>标签: <a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a>
                </p>
            </div>
        </div> <!-- /article-box --><!--单篇文章结束-->
        <!--单篇文章开始-->
        <div class="article-box row clearfix">
            <div class="col-md-4">
                <a href="/" class="thumbnail"><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a>
            </div>
            <div class="caption">
                <h3><a href="">情绪不佳时的说话方式,最见素养</a></h3>
                <p>说话是一门艺术。情绪好的时候，做到说话得体、不失风度，并不是件困难的事。 可是当情绪不佳时，许多人只图一时的宣泄， ...</p>
                <p>分类:<span><a href="#" class="">PHP</a></span>&nbsp;&nbsp;&nbsp;<span>2017-05-16</span></p>
                <p>标签: <a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a>
                </p>
            </div>
        </div> <!-- /article-box --><!--单篇文章结束-->
        <!--单篇文章开始-->
        <div class="article-box row clearfix">
            <div class="col-md-4">
                <a href="/" class="thumbnail"><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a>
            </div>
            <div class="caption">
                <h3><a href="">情绪不佳时的说话方式,最见素养</a></h3>
                <p>说话是一门艺术。情绪好的时候，做到说话得体、不失风度，并不是件困难的事。 可是当情绪不佳时，许多人只图一时的宣泄， ...</p>
                <p>分类:<span><a href="#" class="">PHP</a></span>&nbsp;&nbsp;&nbsp;<span>2017-05-16</span></p>
                <p>标签: <a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a><a href="" class="tag">SUccess</a>
                </p>
            </div>
        </div> <!-- /article-box --><!--单篇文章结束-->


        <!--分页-->
        <ul class="pagination">
            <li><a href="#">首页</a></li>
            <li><a href="#">上一页</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#">8</a></li>
            <li><a href="#">9</a></li>
            <li><a href="#">10</a></li>
            <li><a href="#">下一页</a></li>
            <li><a href="#">尾页</a></li>
        </ul>
    </div><!--左侧结束-->

    <!--右侧开始-->
    <div class="col-md-3 col-md-offset-1">
        <!--广告位置-->
        <div class="adv">
            <div class="thumbnail"><a href=""><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a></div>
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
                <a href="/" class="thumbnail"><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a>
            </div>
            <p>情绪不佳时的说话方式,最见素养</p>
        </div>
        <div class=" row clearfix">
            <div class="col-md-7">
                <a href="/" class="thumbnail"><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a>
            </div>
            <p>情绪不佳时的说话方式,最见素养</p>
        </div>
        <div class=" row clearfix">
            <div class="col-md-7">
                <a href="/" class="thumbnail"><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a>
            </div>
            <p>情绪不佳时的说话方式,最见素养</p>
        </div>
        <div class=" row clearfix">
            <div class="col-md-7">
                <a href="/" class="thumbnail"><img src="<?= Yii::getAlias('@image') . '/1.jpg' ?>" alt=""></a>
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

<script src="<?= Yii::getAlias('@lib') . '/jquery/jquery-1.11.3.js'; ?>"></script>
<script src="<?= Yii::getAlias('@lib') . '/bootstrap/js/bootstrap.min.js' ?>"></script>
</body>
</html>
