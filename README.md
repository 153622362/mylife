<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Use Yii2 To Make Personal Project by ngyhd</h1>
    <br>
</p>



DESCRIPTION 
-------------------

### USAGE

```php
php init //初始化YII2框架
```
Configure your database in `main-local.php`   
```php
   'components' => [
        'db' => [ //配置数据库连接
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.168.199.101;dbname=mylife',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
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
                'username' => 'your email', //邮箱账号
                'password' => 'the password of your email', //邮箱授权码
                'port' => '465',
                'encryption' => 'ssl',

            ],
        ],
    ],
```

### DATABASE
/install/sql/mylife.sql
