<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandUrl' => Yii::$app->homeUrl,
//        'brandImage' => 'logo.png',
        'brandLabel' => 'My Life',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems_left = [
        ['label' => '首页', 'url' => ['/site/index']],
        ['label' => '动态', 'url' => ['/site/topic']],
        ['label' => '问答', 'url' => ['/site/question']],
        ['label' => '话题', 'url' => ['/site/square']],
        ['label' => '广场', 'url' => ['/site/square']],
        ['label' => '关于本站', 'url' => ['/site/about'],'options'=>['class'=>'disabled']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems_right[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems_right[] = ['label' => 'Login', 'url' => ['/site/login'],'items'=>[
            ['label'=>'账号登陆','url'=>['site/login']],
            ['label'=>'<hr style="border:0.3px solid gainsboro;padding: 0px;margin: 0px"/>','encode'=>false,'options'=>['style'=>'padding:0px;margin:0px']],
            ['label'=>'QQ登陆','options'=>['class'=>'disabled','title'=>'目前还未开通此功能']],
            ['label'=>'微信登陆','options'=>['class'=>'disabled','title'=>'目前还未开通此功能']],
            ['label'=>'新浪微博','options'=>['class'=>'disabled','title'=>'目前还未开通此功能']],
        ]];
    } else {
        $menuItems_right[] = '<form class="navbar-form navbar-left" role="search" method="post" action="/search/index">
<div class="input-group">
      <input type="text" class="form-control" placeholder="输入关键字">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
</form>';
//        $menuItems_right[] = '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::submitButton(
//                'Logout (' . Yii::$app->user->identity->username . ')',
//                ['class' => 'btn btn-link logout']
//            )
//            . Html::endForm()
//            . '</li>';

        $menuItems_right[] =[
            'label'=>'<img src="'.Yii::$app->user->identity->avatar.'" style="width: 30px;">',
            'encode'=>false,
            'items' => [
                ['label' => '<span class="glyphicon glyphicon-user"></span>  个人中心','encode'=>false,'url'=>['user/center']],
                ['label' => '<span class="glyphicon glyphicon-cog"></span>  账户设置','encode'=>false,'url'=>['user/center']],
                ['label' => '<span class="glyphicon glyphicon-tasks"></span>  我的帖子','encode'=>false,'url'=>['user/center']],
                ['label' => '<span class="glyphicon glyphicon-star"></span>  我的收藏','encode'=>false,'url'=>['user/center']],
                ['label' => '<span class="glyphicon glyphicon-piggy-bank"></span>  我的积分','encode'=>false,'url'=>['user/center']],
                '<li>' . Html::beginForm(['/site/logout'], 'post') . Html::submitButton('退出 (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout'])
            . Html::endForm()
            . '</li>'

            ],
            'linkOptions' => ['style'=>'padding:10px']
        ];

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItems_left,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems_right,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?> <!--内容-->
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode('My Life') ?> <?= date('Y') ?></p>

<!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->
        <p class="pull-right"></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
