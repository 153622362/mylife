<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Use Yii2 To Make Personal Project by ngyhd</h1>
    <br>
</p>

>Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
>developing complex Web applications with multiple tiers.

>Documentation is at [docs/guide/README.md](docs/guide/README.md).

>[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
>[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
>[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DESCRIPTION 
-------------------

###USAGE

```php
php init
```
Configure your database in `main-local.php`  
like this
```php
   'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.168.199.101;dbname=mylife',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ]
    ],
```