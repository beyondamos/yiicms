<?php
use yii\helpers\Url;
?>
        <div class="hot-topic">
            <h4 class="content-right-title">热门话题</h4>   
            <ul class="hot-topic-list">
                <?php foreach ($this->params['hotTags'] as $tag):?>
                    <li><a href="<?php echo Url::to(['tag/index', 'id' => $tag->id]);?>"><?=$tag->tag_name?></a></li>
                <?php endforeach;?>
            </ul>
        </div>