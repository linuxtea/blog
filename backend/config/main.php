<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log','gii'],
    'modules' => [
		'gridview' => [
            'class' => 'kartik\grid\Module',
        ],
	],
    'components' => [
        'user' => [
            'identityClass' => 'backend\models\Adminuser',
            'enableAutoLogin' => true,
        ],
		'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=wordpress',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
			'tablePrefix'=>'lt_'
        ],
		'response' => [
            'formatters' => [
                'pdf' => [
                    'class' => 'robregonm\pdf\PdfResponseFormatter',
                ],
            ]
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		
    ],
	
    'params' => $params,
];

return $config;