<?php
use yii\helpers\Url;
?>
                <div class="everyone-look">
                    <h4 class="content-right-title">大家都在看</h4>  
                    <ul class="look-list">
                    <?php foreach ($this->params['categoryHotArticles'] as $article):?>
                        <li>
                            <a href="<?=Url::to(['article/detail', 'id' => $article->id]);?>"><img src="<?=$article->thumbnail;?>" alt="<?=$article->title;?>"></a>
                            <p><a href="<?=Url::to(['article/detail', 'id' => $article->id]);?>"><?=$article->title;?></a></p>
                        </li>
                    <?php endforeach;?>
                    </ul>
                </div>