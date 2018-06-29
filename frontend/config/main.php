<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
	'language'=>'zh-CN',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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

        'urlManager' => [
            'enablePrettyUrl' => true,
//			'enableStrictParsing' => true, //严格解释
            'showScriptName' => false,
            'rules' => [

				[
					'class' => 'yii\rest\UrlRule',
//					'only' => [],//仅支持哪些动作
//					'except' => [], //除了XX动作
					'controller' => [
//						'<controller:\w+>/<id:\d+>'=>'<controller>/detail', //
						'u'=>'api/user', //http://localhost/u/1
						'api/user', //http://localhost/api/users/1
//						------------大致如下效果
//						'PUT,PATCH users/<id>' => 'api/user/update',
//						'DELETE users/<id>' => 'api/user/delete',
//						'GET,HEAD users/<id>' => 'api/user/view',
//						'POST users' => 'api/user/create',
//						'GET,HEAD users' => 'api/user/index',
//						'users/<id>' => 'api/user/options',
//						'users' => 'api/user/options',
					],
					//额外字段配置
//					'ruleConfig' => [
//						'class' => 'yii\web\UrlRule',
//						'defaults' => [
//							'expand' => 'profile',
//						]
//					],

				],
            ],
        ],



    ],

	'modules' => [
		//后台
		'admin' => [
			'class' => 'frontend\modules\admin\AdminModule', //后台
		],
		'api' => [
			'class' => 'frontend\modules\api\v1\V1Module', //api
		],

	],
    'params' => $params,
];
