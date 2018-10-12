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
        ['label' => '首页', 'url' => \common\utils\CreateUrl::createUrl('site/index')],
        ['label' => '动态', 'url' => ['/dynamic/index']],
    ];
    $category = \frontend\models\Category::find()->where(['is_nav'=>10])->limit(8)->orderBy('created_at desc')->asArray()->all();
    if (!empty($category)){
        $category_arr = [];
        foreach ($category as $v)
        {
            $category_arr[] = [
                'label'=>$v['name'],
                'url'=>["/dynamic/index?category=".$v['id']]
            ];
        }
        $menuItems_left = array_merge($menuItems_left, $category_arr);
    }

    if (Yii::$app->user->isGuest) {
        $menuItems_right[] = ['label' => '注册', 'url' => ['/site/signup']];
        $menuItems_right[] = ['label' => '登陆', 'url' => ['/site/login'],'items'=>[
            ['label'=>'账号登陆','url'=>['site/login']],
            ['label'=>'<hr style="border:0.3px solid gainsboro;padding: 0px;margin: 0px"/>','encode'=>false,'options'=>['style'=>'padding:0px;margin:0px']],
            ['label'=>'QQ登陆','options'=>['class'=>'disabled','title'=>'目前还未开通此功能']],
            ['label'=>'微信登陆','options'=>['class'=>'disabled','title'=>'目前还未开通此功能']],
            ['label'=>'新浪微博','options'=>['class'=>'disabled','title'=>'目前还未开通此功能']],
        ]];
    } else {


        $menuItems_right[] = '<form class="navbar-form navbar-left visible-lg-inline-block" role="search" method="get" action="/post/search">
<div class="input-group">
      <input type="text" class="form-control" name="param" placeholder="输入关键字">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Go!</button>
      </span>
    </div>
</form>';
        if (!empty(Yii::$app->user->id) && (Yii::$app->params['l_count'] + Yii::$app->params['n_count']) > 0){
            $url = Yii::$app->params['l_count'] > Yii::$app->params['n_count'] ?['/user/message']:['/user/notice'];
            $menuItems_right[] = [
                'label'=>'<span style="border-radius: 50%;background-color: orangered;width: 2rem;padding: 5px;color: white" title="未读消息">'.(Yii::$app->params['l_count'] + Yii::$app->params['n_count']).'</span>',
                'encode' => false,
                'url' => $url,
                'active' => false,
            ];
        }
        $menuItems_right[] =[
            'label'=>'<img src="'.Yii::$app->user->identity->avatar.'" style="width: 30px;">',
            'encode'=>false,
            'items' => [
                ['label' => '👲  个人中心','encode'=>false,'url'=>['user/center']],
                ['label' => '🛠  账户设置','encode'=>false,'url'=>['user/setting']],
                ['label' => '📢  我的提醒','encode'=>false,'url'=>['user/notice']],
                ['label' => '📃  我的私信','encode'=>false,'url'=>['user/message']],
                ['label' => '📅  我的签到','encode'=>false,'url'=>['user/sign']],
                ['label' => '📝  我的帖子','encode'=>false,'url'=>['user/post']],
                ['label' => '🧡  我的收藏','encode'=>false,'url'=>['user/favorite']],
                ['label' => '🎈  我的积分','encode'=>false,'url'=>['user/score']],
                '<li>' . Html::beginForm(['/site/logout'], 'post') . Html::submitButton('退出 (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout'])
            . Html::endForm()
            . '</li>'

            ],
            'linkOptions' => ['style'=>'padding:10px;']
        ];

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItems_left,
        'activateItems' => false
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right '],
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
