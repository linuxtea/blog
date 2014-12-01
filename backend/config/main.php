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
		'elfinder' => [
			'class' => 'mihaildev\elfinder\Controller',
			'access' => ['@'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
			'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
			'roots' => [
				[
					'baseUrl'=>'@web',
					'basePath'=>'@webroot',
					'path' => 'files/global',
					'name' => 'Global'
				],
				[
					'class' => 'mihaildev\elfinder\UserPath',
					'path'  => 'files/user_{id}',
					'name'  => 'My Documents'
				],
				[
					'path' => 'files/some',
					'name' => ['category' => 'my','message' => 'Some Name'] //перевод Yii::t($category, $message)
				],
				[
					'path'   => 'files/some',
					'name'   => ['category' => 'my','message' => 'Some Name'], // Yii::t($category, $message)
					'access' => ['read' => '*', 'write' => 'UserFilesAccess'] // * - для всех, иначе проверка доступа в даааном примере все могут видет а редактировать могут пользователи только с правами UserFilesAccess
				]
			]
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
            'password' => 'yes',
            'charset' => 'utf8',
			'tablePrefix'=>'yh_'
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