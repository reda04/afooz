<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',

    ],
    
    'language'=>'fr',
    'components' => [

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
             'useFileTransport' => false,
         'transport' => [
             'class' => 'Swift_SmtpTransport',
             'host' => 'mail.thewebcompany.ma',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
             'username' => 'afooz@thewebcompany.ma',
             'password' => 'thewebcompany',
             'port' => '25', // Port 25 is a very common port too
           // It is often used, check your provider or mail server specs
         ],
        ],
    

  
        'request' => [
        'parsers' => [
        'application/json' => 'yii\web\JsonParser',
    ],
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Tkt3zkt-Jgf5OdzB_z1U5j5qMKs9Qx3A',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            
        ],
        'authManager'  => [
        'class'        => 'yii\rbac\DbManager',
   ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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

        'db' => $db,
        'authManager'  => [
        'class'        => 'yii\rbac\DbManager',
   ],
       'urlManager' => [
                          'enablePrettyUrl' => true,
                             'enableStrictParsing' => true,
                            'showScriptName' => false,
                        'class' => 'yii\web\UrlManager',
 
                 'rules' => 
                 array( 
                  
                    '<controller:\w+>/<id:\d+>' => '<controller>/view',
                        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                        '<controller:\w+>/<action:\w+>' => '<controller>/<action>', )
],

      'modules'  => [
                    'class'=> 'mdm\admin\Module', 
                     'gridview' =>  [
                                      'class' => '\kartik\grid\Module',
       'i18n' =>  [
    'class' => 'yii\i18n\PhpMessageSource',
    'basePath' => '@kvgrid/messages',
    'forceTranslation' => true
],
    ],

        ]
        ,  

    ],
      

          'as beforeRequest' => [
    'class' => 'yii\filters\AccessControl',
    'rules' => [
        [
            'allow' => true,
            'actions' => ['login','signup','listeenseigne','listerecompense','scancustomer','updateprofile','updatepassword','setpassword','linkfacebook'],
            'roles'=> ['?'],

        ],
        [
            'allow' => true,
            'roles' => ['@'],
        ],
    ],
    'denyCallback' => function () {
        return Yii::$app->response->redirect(['site/login']);
    },
],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',

        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
     $config['modules']['gridview'] = [
        'class' => '\kartik\grid\Module',
        'downloadAction' => 'gridview/export/download',
         'i18n' => []
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
