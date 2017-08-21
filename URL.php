<?php

        'urlManager' => [
            'enablePrettyUrl' => true, //是否启用美化URL
            'suffix' => '.html',    //URL后缀
            'showScriptName' => false,  //是否显示脚本名字 index.php
            'rules' => [
            	'/blogs' => '/blog/index',   //将 /blogs 路由映射到 /blog/index 路由上 
            	'/blogs/<id:\d+>' => '/blog/view',     //可以将 /bolgs/1 路由映射到 /blog/view?id=1 路由上
            	'<controller:\w+>/<id:\d+>' => '<controller>/view', //将所有的 controller/id 映射到 controller/view 上
            	'<controller:\w+>/<action:\w+>' => '<controller>/<action>', 

            ],  //包含URL匹配规则的列表
        ],




?>



