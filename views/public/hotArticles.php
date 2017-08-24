<?php
use yii\helpers\Url;
?>
        <div class="hot-article-rank">
            <h4 class="content-right-title">热门文章排行</h4>
            <ol class="article-list">
                <?php foreach($this->params['hotArticles'] as $article) :?>
                    <li><a href="<?=Url::to(['article/detail', 'id' => $article['id']]);?>"><?=$article['title']?></a></li>
                <?php endforeach;?>
            </ol>
        </div>