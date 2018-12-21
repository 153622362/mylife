
<?=\common\widgets\UserNav::widget()?>

<div class="col-lg-9">
	<div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab">我的提醒</a></li>
<!--			<li role="presentation"><a href="#follow" aria-controls="follow" role="tab" data-toggle="tab">关注</a></li>-->
<!--			<li role="presentation"><a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">评论</a></li>-->
		</ul>
		<!-- Tab panes -->
		<div class="tab-content" style="margin-top: 5px">
			<div role="tabpanel" class="tab-pane active" id="notice">
				<?php if (!empty($data)){
					foreach ($data as $v) {
				?>
				<div class="media">
					<div class="media-left media-middle">
						<a href="<?=\common\utils\CreateUrl::createUrl('user/center',['id'=>$v['uid']])?>">
							<img class="media-object" src="<?=$v['avatar']?>" alt="..." style="width: 4rem">
						</a>
					</div>
					<div class="media-body">
<!--						<a href="/user/post?id=--><?//=$v['uid']?><!--">--><?//=$v['username']?><!--</a>-->
						<span><?=$v['text_content']?></span>
						<h5 class="text-muted"><?=$v['created_at']?></h5>
					</div>
				</div>
				<?php }}?>
			</div>
			<div role="tabpanel" class="tab-pane" id="follow">2</div>
			<div role="tabpanel" class="tab-pane" id="comment">3</div>

		</div>
	</div>
<!--	<ul class="nav nav-tabs">-->
<!--		<li role="presentation" class="active"><a href="#">全部提醒</a></li>-->
<!--		<li role="presentation"><a href="#">关注</a></li>-->
<!--		<li role="presentation"><a href="#">评论</a></li>-->
<!--	</ul>-->
</div>
