<style>
	ul.stats {
		height: 120px;
		text-align: left;
		padding-left: 30px;
	}
	ul.stats li {
		list-style: none;
		width: 33.3%;
		float: left;
	}
</style>
<div class="col-lg-3">
	<div class="panel panel-default">
		<div class="panel-body" style="text-align: center;background-image: url('/static/img/background.jpg');background-repeat: no-repeat;background-size: 100% 120px">
			<div style="position: relative;top: 50px;">
			<img src="/static/img/logo.png" alt="头像" class="img-circle">
			<h1><?=$user['username']?></h1>
			<p style="word-break: break-all"><?=$user['descript']?></p>
			<hr>
				<ul class="stats" >
				<li>财富值 <h3><?=$user['wealth_score']?></h3></li>
				<li>威望值 <h3><?=$user['honor_score']?></h3></li>
				<li>总积分 <h3><?=$user['score']?></h3></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="panel panel-success">
		<div class="panel-heading">个人信息</div>
		<div class="panel-body">
			<h5><span class="glyphicon glyphicon-calendar"></span> 注册日期：<?=date('Y-m-d', $user['created_at'])?></h5>
			<h5><span class="glyphicon glyphicon-log-in"></span> 最后登陆：<?=substr($user['last_log_in'], 0,10)?></h5>
			<h5><span class="glyphicon glyphicon-map-marker"></span> 城市：<?=$user['city']?></h5>
		</div>
	</div>


</div>

<div class="col-lg-6">
	<div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">全部动态</a></li>
			<li role="presentation"><a href="#topic" aria-controls="topic" role="tab" data-toggle="tab">话题</a></li>
		</ul>
		<!-- Tab panes -->
<!--		全部动态-->
		<div class="tab-content" style="margin-top: 10px">
			<div role="tabpanel" class="tab-pane active" id="home">
				<?php foreach ($user['dy'] as $v){?>
					<div class="media">
						<div class="media-left media-middle">
							<a href="#">
								<img class="media-object" src="<?=$user['avatar']?>" style="width: 60px" alt="头像">
							</a>
						</div>
						<div class="media-body">

							<h4 class="media-heading"><?=$user['username']?>
							<?=$v['category'].$v['other_category']?>
							</h4>
							<p><a href="?<?=$v['other_id']?>"><?=$v['title']?></a></p>
							<p><?=$v['created_at']?></p>
						</div>
					</div>
				<?php }?>
			</div>

<!--			话题-->
			<div role="tabpanel" class="tab-pane" id="topic">
				<?php foreach ($user['dy'] as $v){
					if ($v['other_category'] == '文章'){
					?>

				<div class="media">
					<div class="media-left media-middle">
						<a href="#">
							<img class="media-object" src="<?=$user['avatar']?>" style="width: 60px" alt="头像">
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><?=$user['username']?>
							<?=$v['category'].$v['other_category']?>
						</h4>
						<p><a href="?<?=$v['other_id']?>"><?=$v['title']?></a></p>
						<p><?=$v['created_at']?></p>
					</div>
				</div>
				<?php }}?>
			</div>
		</div>
	</div>


<!--	<ul class="nav nav-tabs">-->
<!--		<li role="presentation" class="active"><a href="#">全部动态</a></li>-->
<!--		<li role="presentation"><a href="#">说说</a></li>-->
<!--		<li role="presentation"><a href="#">教程</a></li>-->
<!--		<li role="presentation"><a href="#">扩展</a></li>-->
<!--		<li role="presentation"><a href="#">源码</a></li>-->
<!--		<li role="presentation"><a href="#">问答</a></li>-->
<!--		<li role="presentation"><a href="#">话题</a></li>-->
<!--	</ul>-->
</div>
<div class="col-lg-3">
<!--	<div class="panel panel-default">-->
<!--		<div class="panel-heading">我的资料</div>-->
<!--		<div class="panel-body">-->
<!--			<div class="progress">-->
<!--				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">-->
<!--					等级-->
<!--				</div>-->
<!--			</div>-->
<!---->
<!--			<div class="progress">-->
<!--				<div class="progress-bar-success progress-bar-striped text-center" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">-->
<!--					资料完整度-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="progress">-->
<!--				<div class="progress-bar progress-bar-striped  active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;" title="60%">-->
<!--					活跃度-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
	<div class="panel panel-primary">
		<div class="panel-heading">我的关注</div>
		<div class="panel-body">
			<?php foreach ($user['favorite'] as $v){?>
			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3" style="padding: 2px 3px;"><img style="border-radius: 0.25rem;border: 1px solid grey" src="<?=$v['avatar']?>" width="100%" alt=""></div>
			<?php }?>
		</div>
	</div>
	<div class="panel panel-danger">
		<div class="panel-heading">我的粉丝</div>
		<div class="panel-body">
			<?php foreach ($user['fans'] as $v){?>
			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3" style="padding: 2px 3px;"><img style="border-radius: 0.25rem;border: 1px solid grey" src="<?=$v['avatar']?>" width="100%" alt=""></div>
			<?php }?>
		</div>
	</div>
	<div class="panel panel-info">
		<div class="panel-heading">我的访客</div>
		<div class="panel-body">
			<?php foreach ($user['fans'] as $v){?>
			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3" style="padding: 2px 3px;"><img style="border-radius: 0.25rem;border: 1px solid grey" src="<?=$v['avatar']?>" width="100%" alt=""></div>

			<?php }?>
		</div>
	</div>
</div>

