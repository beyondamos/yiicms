<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no,maximum-scale=1.0,
    minimum-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$this->params['title'];?></title>
    <meta name="keywords" content="<?=$this->params['keywords'];?>" />
    <meta name="description" content="<?=$this->params['description'];?>" />
    <link rel="stylesheet" href="/home/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/home/css/index.css">
    <!--[if lt IE 9]>
      <script src="/home/lib/html5shiv/html5shiv.min.js"></script>
      <script src="/home/lib/respond/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript" src="/plugs/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
      <link rel="stylesheet" href="/plugs/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css">
      <script type="text/javascript">
        SyntaxHighlighter.all();
    </script>
    <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?6663ebf0553f5d151c4aa6abd0d8b4e9";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
      })();
  </script>
</head>
<body>
    <?php $this->beginBody() ?>
    <!-- 导航头部start -->
    <header>
        <div class="container">
            <nav class="navbar navbar-default navbar-main">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="/home/images/logo.png" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="header-nav">
                    <ul class="nav navbar-nav nav-main">
                        <?php foreach ($this->params['navs'] as $nav):?>
                            <!-- <li class="active"><a href="/">首页</a></li> -->
                            <li><a href="<?=$nav['nav_url']?>" <?php echo $nav['is_blank'] == '1'? 'target="_blank"' : '' ;?>><?=$nav['nav_name']?></a></li>
                        <?php endforeach;?>    
                    </ul>
                    <form class="navbar-form navbar-left hidden-xs hidden-sm hidden-md" action="<?=Url::to(['search/index']);?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="keyword" placeholder="请输入关键词">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
                    <ul class="nav navbar-nav nav-main navbar-right">
                    <?php if ($this->params['islogin'] == 0) :?>
                        <li><a href="<?php echo Url::to(['member/register']);?>">注册</a></li>
                        <li><a href="<?php echo Url::to(['member/login']);?>">登录</a></li>
                    <?php elseif($this->params['islogin'] == 1) :?>
                        <li><a href="<?php echo Url::to(['member/index', 'id' => Yii::$app->session->get('memberinfo')['memberid']]);?>"><?php echo Yii::$app->session->get('memberinfo')['memberusername']?></a></li>
                        <li><a href="<?php echo Url::to(['member/logout']);?>">退出</a></li>
                    <?php endif;?>
                    </ul>
                </div>
            </nav>  
        </div>
    </header>
    <!-- 导航头部end -->

    <?php echo $content; ?>


    <!-- 底部代码start -->
    <footer>
        <div class="container">
            <div class="footer-left fl">
                <ul class="clearfix">
<!--                     <li><a href="#">手机版</a></li>
<li><a href="#">关于我们</a></li>
<li><a href="#">联系我们</a></li>
<li><a href="#">商务合作</a></li> -->
                </ul>
                <p class="hidden-xs">
                    <span>Copyright</span>
                    <span>2017-2020</span>
                    <span>版权所有</span>
                    <span>小名叫小明</span>
                    <span>http://www.daydaylearn.com/</span>    
                </p>
            </div>
            <div class="footer-right fr">
                <ul class="clearfix">
                    <li class="pic"><img src="/home/images/code.png" alt=""></li>
                    <li class="suggestion">
                        <p>意见反馈</p>
                        <p>328122186@qq.com</p>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- 底部代码end -->

    <!-- 返回顶部 start-->
    <div class="scroll-main">
        <div class="scroll-top"><a href="javascript:goTop();"><span class="glyphicon glyphicon-chevron-up"></span></a></div>
        <div class="scroll-left">
            去顶部
        </div>
    </div>


    <!-- 返回顶部 end-->
    <script src="/home/lib/jquery/jquery-1.11.3.js"></script>
    <script src="/home/lib/bootstrap/js/bootstrap.js"></script>
    <script src="/home/js/main.js"></script>

    <script>
    $().ready(function() {
        $(".reply").click(function(){
            var replayPrefix = $(this).attr('data-username') + ' ' + $(this).attr('data-floor') + ' ';
            $('#reply_form').append(replayPrefix);
            window.location.href = "#reply_form";
        });
    });
    </script>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>