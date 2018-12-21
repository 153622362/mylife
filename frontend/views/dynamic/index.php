<style>
	.panel{
		margin-bottom: 10px;
	}
	.avatar-width{
		width: 40px;
	}
	*{
		margin: 0;
		padding: 0;
	}
	.media{
		margin: 0;
	}
	.mt5{
		margin-top: 5px;
	}
	.category{
		display: inline-block;
		min-width: 40px;
		max-width: 100px;
		word-break: break-all;
		text-align: center;
		background-color: #5cb85c;
		border-radius: 0.25rem;
		padding: 4px 2px;
		color: white;
		margin-right: 10px;
		font-size: 10px;
	}
	a{
		text-decoration: none;
		color: #555;
	}
	a:hover{
		text-decoration: none;
		color: #555;
	}
	a:active{
		color: grey;
	}
	.media:hover{
		background-color: gainsboro;
	}
	.media{
		border-bottom: 1px solid gainsboro;
		padding: 10px 0px;
	}

	.mw360{
		max-width: 360px;
	}
	.mw200{
		max-width: 200px;
	}
	.title{
		text-overflow: ellipsis;
		display: inline-block;
		word-break: keep-all;
		overflow: hidden;
	}
	p{
		margin: 0;
	}
	.tag{
		/*border-radius: 0.25rem;*/
		padding: 3px;
		padding-left: 10px;
		width: 30%;
	}
	.tag:hover{
		background-color: #50bed2;
	}
</style>
<div class="col-lg-8">
	<div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs " role="tablist">
<!--			<li role="presentation" class="active"><a href="/dynamic/index" aria-controls="dynamice" role="tab" data-toggle="tab">全部动态</a></li>-->

		</ul>
		<!-- Tab panes -->
		<div class="tab-content mt5">
<!--			全部动态-->
			<div role="tabpanel" class="tab-pane active" id="dynamice">
				<?php if (!empty($dy)){
					foreach ($dy as $v){
				?>
				<div class="media">
					<div class="media-left media-middle">
						<a href="<?=\common\utils\CreateUrl::createUrl('user/center',['id'=>$v['uid']])?>">
							<img class="media-object avatar-width" src="<?=$v['avatar']?>" alt="" title="<?=$v['username']?>" data-toggle="tooltip" data-placement="bottom" >
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading">
							<?php if (!empty($v['post_category'])){?>
							<span class="category"><?=$v['post_category']?></span>
							<?php }?>
							<a href="<?=\common\utils\CreateUrl::createUrl('post/index', ['id'=>$v['id']])?>" class="title mw360"><?=$v['title']?></a>
						</h4>
						<span class="text-muted">
							 <span title="留言" data-toggle="tooltip" data-placement="bottom" ><?=$v['comment']?></span>/
							 <span title="收藏" data-toggle="tooltip" data-placement="bottom"><?=$v['favorite']?></span>/
							 <span title="浏览量" data-toggle="tooltip" data-placement="bottom"><?=$v['visitor']?></span>/
							 <span title="最后更新时间" data-toggle="tooltip" data-placement="bottom"><?=$v['updated_at']?></span>
						</span>
					</div>
				</div>
					<?php }}else{ ?>
						<h3>找不到相关数据</h3>
				<?php } ?>

<!--				导航栏-->
				<?php if (!empty($dy)){?>
				<?= \common\widgets\Nav::widget([
							'count_page' => $count,
							'page_size' => $limit,
				])?>
				<?php }?>
				<!--导航栏-->
			</div>

		</div>
	</div>

</div>

<div class="col-lg-4">
	<div class="panel panel-default">
		<a class="btn btn-lg btn-success btn-block"  href="/post/create" >
			<span class="glyphicon glyphicon-plus-sign"></span> <span>发布</span>
		</a>
	</div>
	<?php if (!empty($tag_arr)){ ?>
		<div class="panel panel-default">
			<div class="panel-heading">热门标签</div>
			<div class="panel-body">
				<?php foreach ($tag_arr as $v){ ?>
					<a href="<?=\common\utils\CreateUrl::createUrl('dynamic/index',['tag'=>$v['id']])?>" class="title mw200 tag"  title="<?=$v['tag_name']?>"><?=$v['tag_name']?></a>
				<?php }?>
			</div>
		</div>
	<?php }?>

	<?php if (!empty(Yii::$app->params['advertising'])){//广告
		$v = Yii::$app->params['advertising'][array_rand(Yii::$app->params['advertising'], 1)];
		?>
		<a href="<?=$v['href']?>"><img src="<?=$v['url']?>" alt="<?=$v['descript']?>"  title="<?=$v['descript']?>" style="height: 100px;margin-bottom: 10px;"></a>
	<?php }?>
	<?php if (!empty($newest_comment)){ ?>
		<div class="panel panel-default">
			<div class="panel-heading">最新评论</div>
			<div class="panel-body">
				<?php foreach ($newest_comment as $v){ ?>
					<div class="media" >
						<div class="media-left">
							<a href="<?=\common\utils\CreateUrl::createUrl('user/center',['id'=>$v['uid']])?>">
								<img class="media-object avatar-width" src="<?=$v['avatar']?>" alt="...">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"><a href="<?=\common\utils\CreateUrl::createUrl('user/center',['id'=>$v['uid']])?>"><?=$v['username']?></a></h4>
							<a href="<?=\common\utils\CreateUrl::createUrl('post/index',['id'=>$v['post_id']])?>"><?=$v['content']?></a>
							<p class="text-muted"><?=$v['created_at']?></p>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
	<?php } ?>

	<?php if (!empty($hot_dy)){ ?>
	<div class="panel panel-default">
		<div class="panel-heading">热门动态</div>
		<div class="panel-body">
			<?php foreach ($hot_dy as $v){ ?>
					<p>
					<a href="<?=\common\utils\CreateUrl::createUrl('post/index',['id'=>$v['id']])?>" class="title mw200" ><?=$v['title']?></a>
					</p>
				<?php }?>
		</div>
	</div>
	<?php } ?>
</div>

<script>
	//bootstrap提示

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
