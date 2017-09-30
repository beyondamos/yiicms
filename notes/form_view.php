<?php
use yii\helper\Html;
use yii\widgets\ActiveForm;
?>

表单头部
<?php
$form = ActiveForm::begin([  
    'action' => ['log/login'], //提交地址(*可省略*)  
    'method'=>'post',    //提交方法(*可省略默认POST*)  
    'id' => 'login-form', //设置ID属性  
    'options' => [  
            'class' => 'form-horizontal', //设置class属性  
            'enctype' => 'multipart/form-data' //文件上传时添加该编码  
    ],  
    'fieldConfig' => [  
            'template' => '<div class="form-group"><center><label class="col-md-2 control-label" for="type-name-field">{label}</label></center><div class="col-md-8 controls">{input}{error}</div></div>'  
    ],  //设置模板的样式  
]); 
?>  

表单尾部
<?php ActiveForm::end(); ?> 


文本框:textInput()
<?php echo $form->field($model, 'username')->textInput(['maxlength' => 20])->label(false); ?>
//field()的第3个参数可以传入数组来配置模板属性 ['template' => '']
//textInput()中传入数组，可以配置各种信息。
//比如可以设置验证长度 maxlength, 这样就不用在model中设置了。
//还可以设置 style等参数
//如果不使用它的label可以连贯操作中写上 label(false), 然后可以自己写。

密码框:passwordInput()
<?php echo $form->field($model, 'password')->passwordInput(['maxlength' => 20]) ?>

单选框:radio(),radioList()
<?php echo $form->field($model, 'sex')->radioList(['1'=>'男','0'=>'女']) ?>

复选框:checkbox(),checkboxList()
<?php echo $form->field($model, 'hobby')->checkboxList(['0'=>'篮球','1'=>'足球','2'=>'羽毛球','3'=>'乒乓球']) ?>


下拉框:dropDownList()
<?php echo $form->field($model, 'edu')->dropDownList(['1'=>'大学','2'=>'高中','3'=>'初中'], ['prompt'=>'请选择','style'=>'width:120px']) ?>

隐藏域:hiddenInput()
<?php echo $form->field($model, 'userid')->hiddenInput(['value'=>3]) ?>

文本域:textarea(['rows'=>3])
<?php echo $form->field($model, 'info')->textarea(['rows'=>3]) ?>

文件上传:fileInput()
<?php echo $form->field($model, 'file')->fileInput() ?>

提交按钮:submitButton()
<?php echo Html::submitButton('提交', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>

重置按钮:resetButtun()
<?php echo Html::resetButton('重置', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>



  