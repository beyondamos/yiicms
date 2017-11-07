<?php
use yii\helpers\Url;
$this->params['title'] = $article->title;
?>    
    <!-- content部分start -->
    <div class="content">
        <div class="container">
            <div class="content-left fl news-main">
                <div class="location">
                    您的位置: <a href="/">首页</a> » <a href="<?=Url::to(['article/index', 'id' => $article->catename->id]);?>"><?=$article->catename->name;?></a> » <span> <?=$article->title;?></span>
                </div>
                <div class="content-left-bottom">
                <h1 class="content-left-title"><?=$article->title;?></h1>
                    <div class="article-meta">
                        <span><?=date('Y-m-d', $article->updatetime);?></span>
                        <span>作者: <i><?=$article->author;?></i></span>
                        <span>点击率：<em><?=$article->hits;?></em></span>
                        <span>分类: <a href="<?=Url::to(['article/index', 'id' => $article->catename->id]);?>"><?=$article->catename->name;?></a></span>
                    </div>
                    <div class="article-main">
                     <?php echo $article->text;?>
                    </div>
                    <div class="mark-1">
                        <span class="glyphicon glyphicon-tags"></span>标签:
                        <?php foreach ($article->tagLists as $tag) :?>
                        <a href="<?=Url::to(['tag/index', 'id' => $tag['id']]);?>"><?=$tag['tag_name'];?></a>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="interest">
                    <div class="interest-title">您可能感兴趣的:</div>
                    <ul class="interest-list clearfix">
                        <?php foreach($interestedArticles as $article):?>
                        <li>
                            <a class="interest-pic" href="<?=Url::to(['article/detail', 'id' => $article->id]);?>"><img src="<?=$article->thumbnail;?>" alt=""></a>
                            <a class="interest-p" href="<?=Url::to(['article/detail', 'id' => $article->id]);?>"><?=$article->title?>
                            </a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="interest">
                    <div class="interest-title">认真评论的人年薪百万……</div>
                    <div class="comment-main">
                        
                        <!--PC和WAP自适应版-->
<div id="SOHUCS" sid="<?=$article->id;?>" ></div> 
<script type="text/javascript"> 
(function(){ 
var appid = 'cythKvhHP'; 
var conf = 'prod_6253583ff72170e40bfc58b0122d26f6'; 
var width = window.innerWidth || document.documentElement.clientWidth; 
if (width < 960) { 
window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("http://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })(); </script>
                    </div>
                </div>
            </div>
            <div class="content-right fr hidden-xs hidden-sm">
                <div class="content-right-pic">
                    <a href="#"><img src="/home/images/pig_1.png" alt=""></a>
                </div>

                <!-- 热门文章排行start -->
                    <?php echo $this->render('/public/hotArticles');?>
                <!-- 热门文章排行end -->
                <!-- 大家都在看start -->
                    <?php echo $this->render('/public/categoryHotArticles');?>
                <!-- 大家都在看end -->
                <!-- 置顶推荐start -->
                    <?php echo $this->render('/public/recommendArticles');?>
                <!-- 置顶推荐end -->
                <!-- 热门话题start -->
                    <?php echo $this->render('/public/hotTags');?>
                <!-- 热门话题end -->
            </div>
        </div>
    </div>      
