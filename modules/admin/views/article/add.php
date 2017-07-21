<?php
use yii\bootstrap\ActiveForm;
use yii\helper\Html;
use yii\helpers\Url;
$labels = $model->attributeLabels();
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文章添加</title>
    <link rel="stylesheet" href="/admin/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/admin/css/main.css">
</head>
<body>
<div class="container-fluid">
    <ol class="breadcrumb">
        <li><a href="#">首页</a></li>
        <li><a href="news_list.html">信息中心</a></li>
        <li class="active">文章添加</li>
    </ol>
        <a class="btn btn-primary" href="<?=Url::to(['article/index']);?>" role="button"></span> 返回</a>
    <div class="row">
        <?php if(Yii::$app->session->hasFlash('fail')):?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo Yii::$app->session->getFlash('fail');?></strong>
        </div>
        <?php endif;?>


        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal col-md-8',
                'method' => 'post',
                'enctype' => 'multipart/form-data',
            ]
        ]);?>
            <div class="form-group">
                <label for="title" class="col-md-2 control-label"><?php echo $labels['title'];?></label>
                <div class="col-md-8">
                    <?php echo $form->field($model, 'title',['template' => '{input}{error}'])->textInput(['class' => 'form-control', 'placeholder' => '请输入标题'])->label(false);?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"><?php echo $labels['catid'];?></label>
                <div class="col-md-3">
                <?php echo $form->field($model, 'catid')->dropDownList($category)->label(false);?>
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-md-2 control-label"><?php echo $labels['property'];?></label>
                <div class="col-md-10">
                    <label class="checkbox-inline">
                      <input type="checkbox" id="Article-status" name="Article[status]" value="1"> 审核
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" id="inlineCheckbox2" value="2"> 头条
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" id="inlineCheckbox3" value="3"> 推荐
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="author" class="col-md-2 control-label"><?php echo $labels['author'];?></label>
                <div class="col-md-2">
                    <?php echo $form->field($model, 'author')->textInput()->label(false);?>
                </div>
            </div>
            <div class="form-group">
                <label for="keywords" class="col-md-2 control-label"><?php echo $labels['keywords'];?></label>
                <div class="col-sm-8">
                    <?php echo $form->field($model, 'keywords')->textInput()->label(false);?>
                    <p class="help-block">多个关键词用 "," 半角逗号隔开</p>
                </div>
            </div>
            <div class="form-group">
                <label for="tags" class="col-md-2 control-label"><?php echo $labels['tags'];?></label>
                <div class="col-sm-8">
                    <?php echo $form->field($model, 'tags')->textInput()->label(false);?>
                    <p class="help-block">多个标签用 "," 半角逗号隔开</p>
                </div>
            </div>
            <div class="form-group">
                <label for="titleimg" class="col-md-2 control-label"><?php echo $labels['thumbnail'];?></label>
                <div class="col-md-3">
                    <input class="form-control" type="file" id="titleimg" name="titleimg">
                </div>
            </div>
            <div class="form-group">
                <label for="synopsis" class="col-md-2 control-label"><?php echo $labels['abstract'];?></label>
                <div class="col-md-5">
                    <?php echo $form->field($model, 'abstract')->textArea(['rows' => 4 ])->label(false);?>
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-md-2 control-label"><?php echo $labels['text'];?></label>
                <div class="col-md-10">
                <?php echo $form->field($model, 'text')->widget('pjkui\kindeditor\KindEditor', 
                                                ['clientOptions' => [
                                                    'allowFileManager' => 'true',
                                                    'allowUpload' => 'true'
                                                    ]
                                                ])->label(false); 
                ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input class="btn btn-info" type="submit" value="提交">
                    <input class="btn btn-warning" type="reset" value="重置">
                </div>
            </div>
        <?php ActiveForm::end();?>
    </div>
</div>
<script src="/admin/lib/jquery/jquery-1.11.3.js"></script>
<script src="/admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>