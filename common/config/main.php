<?php
return [
	'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@common/mail',
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure a transport
			// for the mailer to send real emails.
			// 'useFileTransport' => true, //测试可以开启这个
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'smtp.qq.com',
				'username' => 'xxxx@qq.com',
				'password' => 'xxxx', //这个是授权密码不是QQ密码
				'port' => '465',
				'encryption' => 'ssl',

			],
		],
    ],
];
