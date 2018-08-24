<div class="col-lg-9">
	<div>
		<h1 style="display: inline-block">动态</h1>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs navbar-right" role="tablist">
			<li role="presentation" class="active"><a href="#dynamice" aria-controls="dynamice" role="tab" data-toggle="tab">全部动态</a></li>
<!--			<li role="presentation" class=""><a href="#newestdynamic" aria-controls="newestdynamic" role="tab" data-toggle="tab">最新动态</a></li>-->
<!--			<li role="presentation"><a href="#hotestdynamic" aria-controls="hotestdynamic" role="tab" data-toggle="tab">最热动态</a></li>-->
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
<!--			全部动态-->
			<div role="tabpanel" class="tab-pane active" id="dynamice">
				<?php if (!empty($dy)){
					foreach ($dy as $v){
				?>
				<div class="media">
					<div class="media-left media-middle">
						<a href="#">
							<img class="media-object" src="<?=$v['avatar']?>" alt="" style="width: 40px">
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><a href=""><?=$v['title']?></a></h4>
						<span class="text-muted">
							<span class="badge text-success"><?=$v['username']?></span> 发布于 <?=date('Y-m-d',strtotime($v['created_at']))?>
							留言 <span class="badge"><?=$v['comment']?></span>
							收藏 <span class="badge"><?=$v['favorite']?></span>
							最后修改时间 <span class="badge"><?=$v['updated_at']?></span>
						</span>
					</div>
					<hr>
				</div>
					<?php }}?>

<!--				导航栏-->
				<?= \common\widgets\Nav::widget([
					'count_page' => $count
				])?>
				<!--导航栏-->

			</div>
<!--			最新动态-->
			<div role="tabpanel" class="tab-pane" id="newestdynamic">

				<div class="media">
					<div class="media-left media-middle">
						<a href="#">
							<img class="media-object" src="/static/img/logo.png" alt="" style="width: 40px">
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading">Middle aligned media</h4>
						...
					</div>
					<hr>
				</div>
				<div class="media">
					<div class="media-left media-middle">
						<a href="#">
							<img class="media-object" src="/static/img/logo.png" alt="" style="width: 40px">
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading">Middle aligned media</h4>
						...
					</div>
					<hr>
				</div>
				<?=\yii\widgets\LinkPager::widget([
					'pagination' => $pages,
				])?>

			</div>
<!--			最热动态-->
			<div role="tabpanel" class="tab-pane" id="hotestdynamic">

				<div class="media">
					<div class="media-left media-middle">
						<a href="#">
							<img class="media-object" src="/static/img/logo.png" alt="" style="width: 40px">
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading">Middle aligned media</h4>
						...
					</div>
					<hr>
				</div>
				<div class="media">
					<div class="media-left media-middle">
						<a href="#">
							<img class="media-object" src="/static/img/logo.png" alt="" style="width: 40px">
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading">Middle aligned media</h4>
						...
					</div>
					<hr>
				</div>
				<?= \common\widgets\Nav::widget([
					'count_page' => $count
				])?>

			</div>

		</div>
	</div>

</div>

<div class="col-lg-3">
	<div class="panel panel-default">
	<button class="btn btn-lg btn-success" style="width: 100%"><span class="glyphicon glyphicon-plus-sign"></span> <span>发布</span></button>
	</div>
<!--	<div class="list-group">-->
<!--		<a href="#" class="list-group-item active">-->
<!--			Cras justo odio-->
<!--		</a>-->
<!--		<a href="#" class="list-group-item">Dapibus ac facilisis in</a>-->
<!--		<a href="#" class="list-group-item">Morbi leo risus</a>-->
<!--		<a href="#" class="list-group-item">Porta ac consectetur ac</a>-->
<!--		<a href="#" class="list-group-item">Vestibulum at eros</a>-->
<!--	</div>-->
<!---->
<!--	<div class="panel panel-default">-->
<!--		<div class="panel-heading">标签</div>-->
<!--		<div class="panel-body">-->
<!---->
<!--		</div>-->
<!--	</div>-->
<!---->
<!--	<div class="panel panel-default">-->
<!--		<div class="panel-heading">一周热门</div>-->
<!--		<div class="panel-body">-->
<!--			-->
<!--		</div>-->
<!--	</div>-->
<!---->
<!--	<div class="panel panel-default">-->
<!--		<div class="panel-heading">活跃用户</div>-->
<!--		<div class="panel-body">-->
<!--			活跃用户-->
<!--		</div>-->
<!--	</div>-->
</div>