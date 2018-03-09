<?php
use yii\helpers\Url;
$this->params['title'] = $article->webTitle;
$this->params['keywords'] = $article->keywords;
$this->params['description'] = $article->abstract;
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
                    <span>更新于：<?=date('Y-m-d', $article->updatetime);?></span>
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
        <!-- 您可能感兴趣的代码start -->
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
        <!-- 您可能感兴趣的代码end -->
        <!-- 认真评论的人年薪百万代码start -->
        <div class="interest">
            <div class="interest-title">认真评论的人年薪百万……</div>
            <!-- 统计评论条数代码start -->
            <div class="comment-main">
                <!-- 这里开始写评论 -->
                <div class="comment-main-reply">
                    <div class="comment-main-reply-title">共收到<span><?php echo count($commentData);?></span>条回复</div>
                    <ul>
                    
                    <?php foreach($commentData as $comment):?>

                        <li>
                            <a class="member-pic" href="<?php echo Url::to(['member/index', 'id'=> $comment['member']['id']]);?>"><img src="<?php echo $comment['member']['headpicture'];?>" alt=""></a>
                            <div class="comment-main-reply-member">
                                <div class="member-information">
                                    <a href="<?php echo Url::to(['member/index', 'id'=> $comment['member']['id']]);?>"><?php echo $comment['member']['username'];?></a>
                                    <span>•<i id="floor<?php echo $comment['floor'];?>">#<?php echo $comment['floor'];?></i></span>
                                    <span class="hidden-xs">•<?php echo date('Y-m-d H:i:s', $comment['comment_time']);?></span>
                                    <p>
                                        <span class="good hidden-xs">
                                            <!-- <img src="/home/images/good.gif" alt=""> -->
                                            <i></i>
                                            <em>3</em>
                                        </span>
                                        <span class="reply" data-username="@<?php echo $comment['member']['username'];?>" data-floor="#<?php echo $comment['floor'];?>"><i></i>回复此楼</span>
                                    </p>
                                </div>
                                <p class="member-detail">
                                   <?php echo $comment['content'];?>
                                </p>

                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <!-- 统计评论条数代码end -->
            <!-- 添加回复 (需要登录)代码start -->
            <div class="add-reply">
               <div class="add-reply-title">添加回复 <?php if($this->params['islogin'] == 0) :?><span>(需要登录)</span><?php endif;?></div>
               <?php if($this->params['islogin'] == 0) :?>
                <div class="add-reply-title-con">
                    <p>需要 <span><a href="<?php echo Url::to(['member/login']);?>" class="btn btn-primary">登录</a></span> 后方可回复, 如果你还没有账号请点击这里 <span><a href="<?php echo Url::to(['member/register']);?>" class="btn btn-danger">注册</a>。</p>
                </div>
                
            <?php elseif( $this->params['islogin'] == 1 ):?>
                <!-- <div class="add-reply-title-con"> -->
                <form action="<?php echo Url::to(['comment/add']);?>" method="post">
                    <div class="form-group">
                        <textarea id="reply_form" class="form-control" rows="6" placeholder="支持 Markdown 格式，另外请尽量让自己的回复能够对别人有帮助。" name="Comment[content]"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">创建回复</button>
                        <div class="pull-right">
                            <a href="">Markdown排版说明</a>
                        </div>
                    </div>
                    <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->csrfToken;?>" /> 
                    <input type="hidden" name="Comment[article_id]" value="<?php echo $article->id;?>"> 
                </form>
                <!-- </div> -->
            <?php endif;?>
        </div>
        <!-- 添加回复 (需要登录)代码end -->
    </div>
    <!-- 认真评论的人年薪百万代码end -->

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


