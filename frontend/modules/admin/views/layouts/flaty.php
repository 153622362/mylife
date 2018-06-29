<?php 

use yii\helpers\Html;
\klzq\assets\AdminAsset::register($this);
//定义一个roles数组   渠道是看不到数据的  
$arr=['admin','data','business','finance'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>电信支付</title>
        <?= Html::csrfMetaTags() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <!--base css styles-->
        <link rel="stylesheet" href="/flaty/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/flaty/assets/font-awesome/css/font-awesome.min.css">

        <!--page specific css styles-->
        <!--flaty css styles-->
        <link rel="stylesheet" href="/css/flaty.css">
        <link rel="stylesheet" href="/css/flaty-responsive.css">
        <link rel="shortcut icon" href="/img/favicon.png">
        
        <script src="/jedate-3.7/jedate/jquery-1.7.2.js"></script>
        <link rel="stylesheet" href="/jedate-3.7/jedate/skin/jedate.css">
        <?php $this->head() ?>
    </head>
    <body>

        <!-- BEGIN Theme Setting -->
        <div id="theme-setting">
            
           
        </div>
        <!-- END Theme Setting -->

        <!-- BEGIN Navbar -->
        <div id="navbar" class="navbar">
            <button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
                <span class="fa fa-bars"></span>
            </button>
            <a class="navbar-brand" href="#">
                <small>
                    <i class="fa fa-desktop"></i>
                   Mobile pay
                </small>
            </a>

            <!-- BEGIN Navbar Buttons -->
            <ul class="nav flaty-nav pull-right">
                <!-- BEGIN Button Tasks -->
               
                <!-- END Button Tasks -->

                <!-- BEGIN Button Notifications -->
              
                    
             

                <!-- BEGIN Button User -->
                <li class="user-profile">
                    <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
                        <img class="nav-user-photo" src="/img/demo/avatar/avatar1.jpg" alt="Penny's Photo" />
                        <span class="hhh" id="user_info">
                         <?= \Yii::$app->user->identity->username?> 
                        </span>
                        <i class="fa fa-caret-down"></i>
                    </a>

                    <!-- BEGIN User Dropdown -->
                    <ul class="dropdown-menu dropdown-navbar" id="user_menu">
                        <li class="nav-header">
                            <i class="fa fa-clock-o"></i>
                            登录时间 20:45
                        </li>

                    
                        <li>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                个人资料
                                <a href="<?php echo \Yii::$app->urlManager->createUrl(['/sys/admin/language','lang'=>'zh-CN']);?>">中文</a>  
                                <a href="<?php echo \Yii::$app->urlManager->createUrl(['/sys/admin/language','lang'=>'en']);?>">英文</a>  
                            </a>  
                        </li>
                        <li>
                        <?= Html::a('退出', ['/admin/site/logout'], [
                                'style' => 'margin-left:25px',
					            'data' => [
					                'confirm' => '您确定退出网站吗?',
					                'method' => 'post',
					            ],
                         ]) ?>
                        </li>
                    </ul>
                    <!-- BEGIN User Dropdown -->
                </li>
                <!-- END Button User -->
            </ul>
            <!-- END Navbar Buttons -->
        </div>
        <!-- END Navbar -->

        <!-- BEGIN Container -->
        <div class="container" id="main-container">
            <!-- BEGIN Sidebar -->
            <div id="sidebar" class="navbar-collapse collapse">
                <!-- BEGIN Navlist -->
                <ul class="nav nav-list">
                    <!-- BEGIN Search Form -->
                    <li>
                        <form target="#" method="GET" class="search-form">
                            <span class="search-pan">
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" name="search" placeholder="Search ..." autocomplete="off" />
                            </span>
                        </form>
                    </li>
                    <!-- END Search Form -->
                    <li class="active">
                        <a href="/admin/admin/admin">
                            <i class="fa fa-dashboard"></i>
                            <span>后台首页</span>
                        </a>
                    </li>


                    <li>
                        <a href="/admin/read-log/index" class="dropdown-toggle">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>IDFA统计</span>
                        </a>
                    </li>


                    <li>
                        <a href="/admin/category/index" class="dropdown-toggle">
                            <i class="fa fa-th-large"></i>
                            <span>广告分类</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/ads-ios/index" class="dropdown-toggle">
                            <i class="fa fa-apple"></i>
                            <span>广告管理</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/user-app/index" class="dropdown-toggle">
                            <i class="fa fa-user"></i>
                            <span>APP会员管理</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/invitation/index" class="dropdown-toggle">
                            <i class="fa fa-share-alt"></i>
                            <span>邀请表信息</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/mobile-idfa/index" class="dropdown-toggle">
                            <i class="fa fa-th-list"></i>
                            <span>用户任务记录</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/exchange-money/index" class="dropdown-toggle">
                            <i class="fa fa-glyphicon glyphicon-yen"></i>
                            <span>兑换审核</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/task-check/index" class="dropdown-toggle">
                            <i class="fa fa-check-square-o"></i>
                            <span>任务审核</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/red-packet/index" class="dropdown-toggle">
                            <i class="glyphicon glyphicon-credit-card"></i>
                            <span>红包管理</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/user-packet/index" class="dropdown-toggle">
                            <i class="glyphicon glyphicon-piggy-bank"></i>
                            <span>用户获取到的红包</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/announcement/index" class="dropdown-toggle">
                            <i class="fa fa-file-text-o"></i>
                            <span>公告管理</span>
                        </a>
                    </li>



                    <!-- 超级管理员账号 -->
                    <?php  if(\Yii::$app->user->identity->roles=='admin'):?>
                        <li>
                            <a href="/admin/admin/index" class="dropdown-toggle">
                                <i class="fa fa-user"></i>
                                <span>用户管理</span>
                            </a>
                        </li>
                    <?php endif;?>
                    <!-- 超级管理员账号 -->



                 
                </ul>
                <!-- END Navlist -->

                <!-- BEGIN Sidebar Collapse Button -->
                <div id="sidebar-collapse" class="visible-lg">
                    <i class="fa fa-angle-double-left"></i>
                </div>
                <!-- END Sidebar Collapse Button -->
            </div>
            <!-- END Sidebar -->

            <!-- BEGIN Content -->
            <div id="main-content">
                <!-- BEGIN Page Title -->
                <div class="page-title">
                    <div>
                        <h1><i class="fa fa-file-o"></i> </h1>
                     
                    </div>
                </div>
                <!-- END Page Title -->

                <!-- BEGIN Breadcrumb -->
                <div id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li class="active"><i class="fa fa-home"></i> Home</li>
                    </ul>
                </div>
                <!-- END Breadcrumb -->
                
                    <?php $this->beginBody() ?>
			        <?= $content ?>
                <!-- BEGIN Main 内容Content -->
                
                <!-- END Main Content -->
                
                <footer>
                    <p><?=date('Y')?> © Ads.</p>
                </footer>

                <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="fa fa-chevron-up"></i></a>
            </div>
            <!-- END Content -->
        </div>
        <!-- END Container -->
  

        <!--basic scripts-->
        <script src="/flaty/assets/jquery/jquery-2.1.4.min.js"></script>
        <script>window.jQuery || document.write('<script src="/flaty/assets/jquery/jquery-2.1.4.min.js"><\/script>')</script>
        <script src="/flaty/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/js/my.js"></script>
        <script src="/flaty/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="/flaty/assets/jquery-cookie/jquery.cookie.js"></script>

        <!--page specific plugin scripts-->
        <script src="/flaty/assets/flot/jquery.flot.js"></script>
        <script src="/flaty/assets/flot/jquery.flot.resize.js"></script>
        <script src="/flaty/assets/flot/jquery.flot.pie.js"></script>
        <script src="/flaty/assets/flot/jquery.flot.stack.js"></script>
        <script src="/flaty/assets/flot/jquery.flot.crosshair.js"></script>
        <script src="/flaty/assets/flot/jquery.flot.tooltip.min.js"></script>
        <script src="/flaty/assets/sparkline/jquery.sparkline.min.js"></script>

        <!--flaty scripts-->
        <script src="/js/flaty.js"></script>
        <script src="/js/flaty-demo-codes.js"></script>
       
    </body>
    <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
