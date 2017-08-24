<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>    
    <!-- content部分start -->
    <div class="content">
        <div class="container">
            <div class="content-left fl">
                <div class="content-top">
                    <div class="row">
                        <div class="col-sm-6">
                            <div id="carousel-banner" class="carousel slide banner-slide" data-ride="carousel">
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                <li data-target="#carousel-banner" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-banner" data-slide-to="1"></li>
                                <li data-target="#carousel-banner" data-slide-to="2"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active" style="background-image:url('/home/images/166.jpg')"></div>
                                <div class="item" style="background-image:url('/home/images/87341-1.jpg')"></div>
                                <div class="item" style="background-image:url('/home/images/87349-1.jpg')"></div>
                                <div class="item" style="background-image:url('/home/images/87392-1.jpg')"></div>
                                <div class="item" style="background-image:url('/home/images/87444-1.jpg')"></div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-banner" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-banner" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div></div>
                        <div class="col-sm-6">
                            <ul class="banner-r">
                                <li>
                                    <h3><a href="">没有明星代言，小公司该如何推广自己的APP?小公司该如何推广自己的APP?</a></h3>
                                    <p>明星代言APP，其实只是一个噱头，真正的制胜关键，是将APP的用户运营好，将用户转化为忠</p>
                                </li>
                                <li>
                                    <h3><a href="">从下岗女工到集团老总，从8平米的小店到市值</a></h3>
                                    <p>她的一生很不走运：读初中时遇上文化大革命，被下放到农村当了5年农民；好不容易回了城，有了一份固定工作，却</p>
                                </li>
                                <li>
                                    <h3><a href="">电子毒品《王者荣耀》到底毒在哪</a></h3>
                                    <p>《王者荣耀》系统又双叒更新了，新赛季的系统以夏侯淳、小乔和钟无艳的夏日皮肤为主题...</p>
                                </li>
                            </ul></div>
                        </div>
                    </div>
                    <div class="content-left-bottom">
                        <h4 class="content-left-title">最新资讯</h4>
                        <ul class="latest-information-list clearfix">

                        <?php foreach($articles as $article):?>
                            <li>
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 col-xs-4 latest-information-l">
                                        <div class="latest-information-pic">
                                            <a href="<?=Url::to(['article/detail', 'id' => $article->id]);?>"><img src="<?=$article->thumbnail;?>" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-md-8 col-xs-8 latest-information-r">
                                        <h3><a href="<?=Url::to(['article/detail', 'id' => $article->id]);?>"><?=$article->title;?></a></h3>
                                        <p><?=$article->abstract;?></p>
                                        <div>
                                            <span class="news-category"><a href="<?=Url::to(['article/index', 'id' => $article->catename->id]);?>"><?=$article->catename->name;?></a></span>
                                            <span class="date"><?=date('Y-m-d', $article->updatetime);?></span>
                                            <i>访问量: <span class="badge"><?=$article->hits;?></span></i>
                                        </div>
                                        <div class="mark-1">
                                            <span class="glyphicon glyphicon-tags"></span>标签:
                                            <?php foreach ($article->tagLists as $tag):?>
                                            <a href="<?=Url::to(['tag/index', 'id' => $tag['id']]);?>"><?=$tag['tag_name'];?></a>
                                        <?php endforeach;?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach;?>        
                        </ul>

                        <!-- 分页 -->
<div class="page">
<?php echo LinkPager::widget([
        'pagination' => $pagination,
        'firstPageLabel' => '首页',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'lastPageLabel' => '末页',
]);?>
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
        <div class="everyone-look">
            <h4 class="content-right-title">大家都在看</h4>  
            <ul class="look-list">
                <li>
                    <a href="#"><img src="/home/images/look_1.jpg" alt=""></a>
                    <p><a href="#">医生、翻译、间谍将首先失业，中产阶层正在被掏空，99%的人面怎样实现“智能转型”？</a></p>
                </li>
                <li>
                    <a href="#"><img src="/home/images/look_2.jpg" alt=""></a>
                    <p><a href="#">医生、翻译、间谍将首先失业，中产</a></p>
                </li>
                <li>
                    <a href="#"><img src="/home/images/look_3.jpg" alt=""></a>
                    <p><a href="#">医生、翻译、间谍将首先失业，中产阶层正在被掏空，99%的人面怎样实现“智能转型”？</a></p>
                </li>
                <li>
                    <a href="#"><img src="/home/images/look_4.jpg" alt=""></a>
                    <p><a href="#">医生、翻译、间谍将首先失业，中产阶层正在被掏空？</a></p>
                </li>
                <li>
                    <a href="#"><img src="/home/images/look_5.png" alt=""></a>
                    <p><a href="#">医生、翻译、间谍将首先失业，中产阶层正在被掏空，99%的人面怎样实现“智能转型”？</a></p>
                </li>
                <li>
                    <a href="#"><img src="/home/images/look_6.png" alt=""></a>
                    <p><a href="#">医生、翻译、间谍将首先失业，中产阶层正在被掏空，99%的人面怎样实现“智能转型”？</a></p>
                </li>
            </ul>
        </div>
        <!-- 大家都在看end -->
        <!-- 热门话题start -->
        <?php echo $this->render('/public/hotTags');?>
        <!-- 热门话题end -->
    </div>
</div>
</div>      

