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
    <link rel="stylesheet" type="text/css" href="/plugs/webuploader/webuploader.css">
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
            'fieldConfig' => [
                'template' => '{input}{error}',
            ],
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
                      <input type="checkbox" id="Article-status" name="Article[status]" > 审核
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" id="Article-top" name="Article[top]" > 头条
                    </label>                    
                    <label class="checkbox-inline">
                      <input type="checkbox" id="Article-carousel" name="Article[carousel]" > 首页轮播
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" id="Article-recommend" name="Article[recommend]" > 栏目推荐
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="author" class="col-md-2 control-label"><?php echo $labels['author'];?></label>
                <div class="col-md-2">
                    <?php echo $form->field($model, 'author')->textInput(['value' => $author])->label(false);?>
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
            <!-- 图片上传 -->
            <div class="form-group">
                <label for="thumbnail" class="col-md-2 control-label"><?php echo $labels['thumbnail'];?></label>
                <div class="col-md-3">
                    <div id="uploader-demo">
                        <div id="filePicker">选择图片</div>
                        <?php echo $form->field($model, 'thumbnail')->hiddenInput()->label(false);?>
                    </div>
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
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="Article[text]" type="text/plain">
                    </script>
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
<script type="text/javascript" src="/plugs/webuploader/webuploader.js"></script>
<!-- 配置文件 -->
<script type="text/javascript" src="/plugs/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/plugs/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container', {
        initialFrameHeight : 500,
        maximumWords : 50000,
    });
</script>
<script>
    // 初始化Web Uploader
    var uploader = WebUploader.create({
        // 选完文件后，是否自动上传。
        auto: true,
        //上传图片是否压缩
        compress: false,
        //重名文件继续添加
        duplicate: true,
        // swf文件路径
        swf: '/plugs/webuploader/Uploader.swf',
        // 文件接收服务端。
        server: '<?=Url::to(['tools/ajax-upload-img']);?>',
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#filePicker',
    });

   // 文件上传成功，给item添加成功class, 用样式标记上传成功。  
   uploader.on( 'uploadSuccess', function( file , response) {
        if (response.status == 0) {
            var error = '<p id="img-error" style="color:#a94442">'+ response.info +'</p>';
            $('#filePicker').append(error);
        } else if (response.status == 1) {
            $('#img-error').remove();
            var img = $('#thumbnail');
            if (img) {
                img.remove();
            }
            img = '<img id="thumbnail" src="'+ response.info +'" width="240px" height="150px">';
            $('#filePicker').append(img);
            $('#article-thumbnail').attr('value', response.info);
        }
   });  

</script>

</body>
</html>