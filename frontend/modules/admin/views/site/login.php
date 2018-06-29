<?php 
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

//使用验证码
use yii\captcha\Captcha;


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>快乐赚</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?= url::base(true)?>/css/cloud-admin.css">
    <!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?=Url::base(true)?>/css/uniform.default.min.css" />
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="<?=Url::base(true)?>/css/animate.min.css" />
	<link href="<?=Url::base(true)?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- FONTS -->
	
</head>
<body class="login">	

	<!-- PAGE -->
	<section id="page">
			<!-- HEADER -->
			<header>
				<!-- NAV-BAR -->
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div id="logo">
<!-- 								<a href=""><img src="/img/logo.png" height="80" width="230" alt="logo name" /></a>-->
							</div>
						</div>
					</div>
				</div>
				<!--/NAV-BAR -->
			</header>
			<!--/HEADER -->
			<!-- LOGIN -->
			<section id="login_bg" class="visible">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box">
								<h2 class="bigintro">Sign In</h2>
								<div class="divide-40"></div>
								   <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
									    <?= $form->field($model, 'username')->textInput(['placeholder' => '用户名'])->label(false)?>
								        <?= $form->field($model, 'password')->passwordInput(['placeholder' =>'密码'])->label(false) ?>
								  <div>
									<label class="checkbox"> <input type="hidden"  name="LoginForm[rememberMe]" value="0"><input type="checkbox" id="loginform-rememberme" class="uniform" name="LoginForm[rememberMe]" value="1" checked> Remember me</label>
									<button type="submit" class="btn btn-danger">登 录</button>
								  </div>
								 <?php ActiveForm::end(); ?>		
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--/LOGIN -->
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?=Url::base(true)?>/js/jquery-2.0.3.min.js"></script>
	
  	<!-- JQUERY UI-->
	<script src="<?=Url::base(true)?>/js/jquery-ui-1.10.3.custom.min.js"></script>
	
    <!-- BOOTSTRAP -->
	<script src="<?=Url::base(true)?>/bootstrap-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=Url::base(true)?>/js/jquery.uniform.min.js"></script>
	

	<script type="text/javascript" src="<?=Url::base(true)?>/js/jquery.backstretch.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?=Url::base(true)?>/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("login_bg");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>

	<!-- /JAVASCRIPTS -->
</body>
</html>