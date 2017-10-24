<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no,maximum-scale=1.0,
    minimum-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台登录</title>
    <link rel="stylesheet" href="/admin/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/admin/css/login.css">
    <!--[if lt IE 9]>
      <script src="lib/html5shiv/html5shiv.min.js"></script>
      <script src="lib/respond/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="login-box">
        <div class="login">
            <div class="login-title">
                <span>后台登录</span>
            </div>
            <?php $form = ActiveForm::begin([
                            'method' => 'post',
                            'action' => Url::to(['login/index'])
            ]);?>
            <table class="login-form">
                <tr>
                    <td><label for="username">用户名：</label></td>
                    <td>
                        <?php echo $form->field($model, 'username', ['template' => '{input}{error}'])->textInput()->label(false);?>
                    </td>
                </tr>
                <tr>
                    <td><label for="mima">密 码：</label></td>
                    <td>
                        <?php echo $form->field($model, 'password')->passwordInput()->label(false);?>
                    </td>
                </tr>
                <tr>
                    <td><label for="verificationCode">验证码：</label></td>
                    <td>
                        <!-- <input class="form-control verification-code" type="text" id="verificationCode"> -->
                        <?php echo $form->field($model, 'verifyCode')->widget(Captcha::classname(),[
                            'name' => 'verfiyCode',
                            'captchaAction' => 'login/captcha', 
                            'imageOptions' => [
                                'id'=>'captchaimg', 
                                'title'=>'换一个', 
                                'alt'=>'换一个', 
                                'style'=>'cursor:pointer;margin-left:25px;'
                                ],
                             'options' => [
                                'class' => 'form-control verification-code',
                                'type' => 'text',
                                ],   
                            'template'=>'{input}{image}'         
                        ])->label(false);?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="login-submit">
                        <input type="submit" value="登录">
                    </td>
                </tr>
            </table>
        <?php ActiveForm::end();?>
        </div>
    </div>
    <script src="/admin/lib/jquery/jquery-1.11.3.js"></script>
    <script src="/admin/lib/bootstrap/js/bootstrap.js"></script>
    <script src="/admin/js/main.js"></script>
    <script>
        $(document).ready(function (){
            function resize() {
                var windowHeight = $(window).height();
                $(".login-box").css("height",windowHeight);
            }
            $(window).on("resize",resize).trigger("resize"); 
            // $("#captchaimg").click(function(){
            //     var src = $(this).attr('src');
            //     $(this).attr('src', src + Math.random());
            // });

        });   

    </script>
</body>
</html>
