<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
    <!-- content部分start -->
    <div class="content">
        <div class="container">
            <div class="content-left fl">
                <div class="location">
                    您的位置: <a href="/">首页</a> » <span><?=$category->name;?></span>
                </div>
                <div class="content-left-bottom">
                    <h4 class="content-left-title"><?=$category->name;?></h4>
                    <ul class="latest-information-list clearfix">
                    <?php foreach ($articles as $article):?>    
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
                                        <!-- <span class="news-category"><a href="#">新鲜干货</a></span> -->
                                        <span class="date"><?=date('Y-m-d', $article->updatetime);?></span>
                                        <i>点击率: <span class="badge"><?=$article->hits;?></span></i></div>
                                    <div class="mark-1">
                                        <span class="glyphicon glyphicon-tags"></span>标签:
                                    <?php foreach($article->tagLists as $tag):?>    
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
<?php
    echo LinkPager::widget([
            'pagination' => $pagination,
            'firstPageLabel' => '首页',
            'prevPageLabel' => '上一页',
            'nextPageLabel' => '下一页',
            'lastPageLabel' => '末页',
        ]);
?>
</div>

                </div>
            </div>
            <div class="content-right fr hidden-xs hidden-sm">
                <div class="content-right-pic">
                    <a href="#"><img src="/home/images/pig_1.png" alt=""></a>
                </div>
                <!-- 热门文章排行start -->
                <div class="hot-article-rank">
                    <h4 class="content-right-title">热门文章排行</h4>
                    <ol class="article-list">
                        <li><a href="#">一篇小学生作文《我的爸爸在华为》，看哭无数人！</a></li>
                        <li><a href="#">你的不自律，正在慢慢毁掉你</a></li>
                        <li><a href="#">为什么越来越多的人，朋友圈仅三天可见</a></li>
                        <li><a href="#">共享单车被偷光了！90%已找不到了</a></li>
                        <li><a href="#">为什么永远不要打探别人工资？</a></li>
                        <li><a href="#">Hr不会告诉你：80后正在面临的危机——被90后干掉</a></li>
                        <li><a href="#">一篇小学生作文《我的爸爸在华为》，看哭无数人！</a></li>
                        <li><a href="#">你的不自律，正在慢慢毁掉你</a></li>
                        <li><a href="#">为什么越来越多的人，朋友圈仅三天可见</a></li>
                        <li><a href="#">共享单车被偷光了！90%已找不到了</a></li>
                        <li><a href="#">为什么永远不要打探别人工资？</a></li>
                        <li><a href="#">Hr不会告诉你：80后正在面临的危机——被90后干掉</a></li>
                    </ol>
                </div>
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
                <!-- 置顶推荐start -->
                <div class="recoment">
                    <h4 class="content-right-title">置顶推荐</h4>
                    <ul class="recoment-list clearfix">
                        <li>
                            <a class="recoment-pic" href="#"><img src="/home/images/recoment-1.jpg" alt=""></a>
                            <a class="recoment-title" href="#">没有明星代言，小公司该如何推广自己</a>
                        </li>
                        <li>
                            <a class="recoment-pic" href=""><img src="/home/images/recoment-2.jpg" alt=""></a>
                            <a class="recoment-title" href="#">从下岗女工到集团老总，从8平米的小店到市值120亿的上市公司，她只用了23年</a>
                        </li>
                        <li>
                            <a class="recoment-pic" href=""><img src="/home/images/recoment-3.jpg" alt=""></a>
                            <a class="recoment-title" href="#">没有明星代言，小公司该如何推广自己</a>
                        </li>
                        <li>
                            <a class="recoment-pic" href=""><img src="/home/images/recoment-4.jpg" alt=""></a>
                            <a class="recoment-title" href="#">从下岗女工到集团老总，从8平米的小店到市值120亿的上市公司，她只用了23年</a>
                        </li>
                        <li>
                            <a class="recoment-pic" href=""><img src="/home/images/recoment-5.jpg" alt=""></a>
                            <a class="recoment-title" href="#">没有明星代言，小公司该如何推广自己</a>
                        </li>
                        <li>
                            <a class="recoment-pic" href=""><img src="/home/images/recoment-6.png" alt=""></a>
                            <a class="recoment-title" href="#">从下岗女工到集团老总，从8平米的小店到市值120亿的上市公司，她只用了23年</a>
                        </li>
                    </ul>
                </div>
                <!-- 置顶推荐end -->
                <!-- 热门话题start -->
                <div class="hot-topic">
                    <h4 class="content-right-title">热门话题</h4>   
                    <ul class="hot-topic-list">
                        <li><a href="#">互联网</a></li>
                        <li><a href="#">中国</a></li>
                        <li><a href="#">产品</a></li>
                        <li><a href="#">app</a></li>
                        <li><a href="#">微信</a></li>
                        <li><a href="#">IP</a></li>
                        <li><a href="#">996</a></li>
                        <li><a href="#">BAT</a></li>
                        <li><a href="#">90后</a></li>
                        <li><a href="#">运营</a></li>
                        <li><a href="#">上市</a></li>
                        <li><a href="#">创业</a></li>
                        <li><a href="#">用户</a></li>
                        <li><a href="#">CEO</a></li>
                        <li><a href="#">营销</a></li>
                    </ul>
                </div>
                <!-- 热门话题end -->
            </div>
        </div>
    </div>      
