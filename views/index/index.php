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
                            <?php foreach($carousels as $key => $carousel):?>
                                <div class="item <?php echo  $key==0 ? 'active' : '';?> ">
                                    <img src="<?php echo $carousel['thumbnail'];?>">
                                    <div class="carousel-caption">
                                        <a style="color:white" target="_blank" href="<?php echo Url::to(['article/detail', 'id' => $carousel['id']]);?>"><?php echo $carousel['title'];?></a>
                                    </div>
                                </div>
                            <?php endforeach;?>    
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
                    </div>  
                </div>
                <div class="col-sm-6">
                    <ul class="banner-r">
                        <?php foreach($tops as $top):?>
                            <li>
                                <h3>
                                    <a href="<?php echo Url::to(['article/detail', 'id' => $top['id']]);?>"><?php echo $top['title'];?></a>
                                </h3>
                                <p><?php echo $top['abstract'];?></p>
                            </li>
                        <?php endforeach;?>    
                    </ul>
                </div>
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
                                <div class="hidden-xs">
                                    <span class="news-category"><a href="<?=Url::to(['article/index', 'id' => $article->catename->id]);?>"><?=$article->catename->name;?></a></span>
                                    <span class="date"><?=date('Y-m-d', $article->updatetime);?></span>
                                    <i>访问量: <span class="badge"><?=$article->hits;?></span></i>
                                </div>
                                <div class="mark-1 hidden-xs">
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
            <!-- 置顶推荐start -->
            <?php echo $this->render('/public/recommendArticles');?>
            <!-- 置顶推荐end -->
            <!-- 热门话题start -->
            <?php echo $this->render('/public/hotTags');?>
            <!-- 热门话题end -->
        </div>
    </div>
</div>      

