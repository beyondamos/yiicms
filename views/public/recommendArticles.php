<?php
use yii\helpers\Url;
?>
                <div class="recoment">
                    <h4 class="content-right-title">置顶推荐</h4>
                    <ul class="recoment-list clearfix">
                    <?php foreach($this->params['recommendArticles'] as $article):?>
                        <li>
                            <a class="recoment-pic" href="<?=Url::to(['article/detail', 'id' => $article->id]);?>"><img src="<?=$article->thumbnail;?>" alt="<?=$article->title;?>"></a>
                            <a class="recoment-title" href="<?=Url::to(['article/detail', 'id' => $article->id]);?>"><?=$article->title;?></a>
                        </li>
                    <?php endforeach;?>    
                    </ul>
                </div>