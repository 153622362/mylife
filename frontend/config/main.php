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
//		'assetManager' => [
//			'bundles' => [
//				'all' => [
//					'class' => 'yii\web\AssetBundle',
//					'basePath' => '@webroot/assets',
//					'baseUrl' => '@web/assets',
//					'css' => ['all-xyz.css'],
//					'js' => ['all-xyz.js'],
//				],
//				'appendTimestamp' => true,
//				'yii\web\JqueryAsset' => [
//					'sourcePath' => null,   // 一定不要发布该资源
//					'js' => [
//						YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
//					]
//				],
//			],
//		],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '127.0.0.1',
            'port' => 6379,
            'database' => 0,
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser', //用于JSON输入
//				若未按上述配置，API 将仅可以分辨 application/x-www-form-urlencoded 和 multipart/form-data 输入格式。
			]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
//			'on search' => function ($event) {
//				Yii::info("搜索的关键词： " . $event->keyword);
//			},
//			'as indexer' => [
//				'class' => 'app\components\IndexerBehavior',
				// ... 初始化属性值 ...
//on eventName 元素指定了附加到对象事件上的句柄是什么。 请注意，数组的键名由 on 前缀加事件名组成。 请参考事件章节了解事件句柄格式。
//as behaviorName 元素指定了附加到对象的行为。 请注意，数组的键名由 as 前缀加行为名组成。$behaviorConfig 值表示创建行为的配置信息，格式与我们之前描述的配置格式一样。
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
			'flushInterval' => 100,   // default is 1000 数组积累到100条 然后记录到 targets
            'targets' => [
                [
//					日志格式 Timestamp [IP address][User ID][Session ID][Severity Level][Category] Message Text
                    'class' => 'yii\log\FileTarget',
					'logVars' => [], //$_GET, $_POST, $_FILES, $_COOKIE,$_SESSION 和 $_SERVER
//					'logFile' => '', //日志目标文件
					'levels' => ['error', 'warning','info'],
					'exportInterval' => 100,  // default is 1000 满100导出消息
					'except' => [
						'yii\web\HttpException:404',
					],

				],
				 [
					'class' => 'yii\log\FileTarget',
					 'levels' => ['info','warning'],
					 'categories' => ['exception_db'],
					 'logFile' => '@app/runtime/logs/post/info',
					 'logVars' => [],
					 'exportInterval' => 100,  // default is 1000 满100导出消息

				 ],

            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
			'maxSourceLines' => 10, //异常页面最多显示20条源代码。
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
//			'enableStrictParsing' => true, //严格解释
            'showScriptName' => false,
            'rules' => [
				'search' => 'post/search',
				'login'=>'site/login',
				''=>'site/index',
				'page/<id:\d+>' => 'post/index', //文章
				'dynamic/<page:\d+>' => 'dynamic/index', //动态
				'u/<id:\d+>'=> 'user/center', //用户中心
				[
					//API
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
					//额外字段配置 //restful api
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
