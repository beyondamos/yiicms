<?php
use yii\bootstrap\ActiveForm;
use yii\helper\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文章添加</title>
    <link rel="stylesheet" href="<?=Yii::getAlias('@admin/lib').'/bootstrap/css/bootstrap.css';?>">
    <link rel="stylesheet" href="__CSS__/main.css">
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
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal col-md-8',
                'method' => 'post',
                'enctype' => 'multipart/form-data',
            ]
        ]);?>
            <div class="form-group">
                <label for="title" class="col-md-2 control-label">标题</label>
                <div class="col-md-8">
                    <?php echo $form->field($model, 'title',['template' => '{input}{error}'])->textInput(['class' => 'form-control', 'placeholder' => '请输入标题'])->label(false);?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">文章分类</label>
                <div class="col-md-3">
                    <select class="form-control" name="cate_id">
                        <option value="0">请选择分类</option>
                        <volist name="category_data" id="vo">
                            <option value="<{$vo.cate_id}>"><{:str_repeat('--',$vo['level']*2)}><{$vo.cate_name}>
                            </option>
                        </volist>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-md-2 control-label">信息属性</label>
                <div class="col-md-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="status" checked>审核
                        </label>
                        <label>
                            <input type="checkbox" name="headline" >头条
                        </label>
                        <label>
                            <input type="checkbox" name="is_recommend">推荐
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="keywords" class="col-md-2 control-label">关键词</label>
                <div class="col-sm-8">
                    <input class="form-control" id="keywords" name="keywords" placeholder="请输入关键词">
                    <p class="help-block">多个关键词用 "," 半角逗号隔开</p>
                </div>
            </div>
            <div class="form-group">
                <label for="titleimg" class="col-md-2 control-label">标题图片</label>
                <div class="col-md-3">
                    <input class="form-control" type="file" id="titleimg" name="titleimg">
                </div>
            </div>
            <div class="form-group">
                <label for="tags" class="col-md-2 control-label">标签</label>
                <div class="col-sm-8">
                    <input class="form-control" id="tags" name="tags" placeholder="请输入标签">
                    <p class="help-block">多个标签用 "," 半角逗号隔开</p>
                </div>
            </div>
            <div class="form-group">
                <label for="synopsis" class="col-md-2 control-label">内容简介</label>
                <div class="col-md-5">
                    <textarea class="form-control" rows="4" name="synopsis" id="synopsis"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="author" class="col-md-2 control-label">作者</label>
                <div class="col-md-2">
                    <input class="form-control" id="author" name="author" placeholder="请输入作者名字">
                </div>
            </div>
            <div class="form-group">
                <label for="newstime" class="col-md-2 control-label">发布时间</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <input class="form-control " id="newstime" name="newstime">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">设为当前时间</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="clicks" class="col-md-2 control-label">点击数</label>
                <div class="col-md-2">
                    <input class="form-control" id="clicks" name="clicks" value="1">
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-md-2 control-label">正文</label>
                <div class="col-md-10">
                    <!-- <textarea class="form-control" rows="10" id="content"> -->
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="content" type="text/plain">
                    </script>
                    <!-- </textarea> -->
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
<script src="<?=Yii::getAlias('@admin/lib').'/jquery/jquery-1.11.3.js';?>"></script>
<script src="<?=Yii::getAlias('@admin/lib').'/bootstrap/js/bootstrap.min.js'?>"></script>
</body>
</html>