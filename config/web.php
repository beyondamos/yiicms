<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'index',
    'timeZone' => 'Asia/Shanghai',

    /**
     * 增加后台模块
     */
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Admin',
            'defaultRoute' => 'index',  //修改默认控制器名称为index
            // 'components' => [
            //     'urlManager' => [
            //         'enablePrettyUrl' => false, //是否启用美化URL
            //     ],
            // ],

        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'xiaoming',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        
        'urlManager' => [
            'enablePrettyUrl' => true, //是否启用美化URL
            'suffix' => '.html',    //URL后缀
            'showScriptName' => false,  //是否显示脚本名字 index.php
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/detail',
                '<controller:\w+>/<action>/<id:\d+>' => '<controller>/<action>',
            ],  //包含URL匹配规则的列表
        ],
        
    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
