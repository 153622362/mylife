<div class="col-lg-3">

	<div class="list-group">
		<div class="list-group">
			<a href="/user/setting" class="list-group-item">账户设置</a>
			<a href="/user/notice"  class="list-group-item active">我的提醒</a>
			<a href="/user/message" class="list-group-item">我的私信</a>
			<a href="/user/sign" 		 class="list-group-item">我的签到</a>
			<a href="/user/post" 		 class="list-group-item">我的帖子</a>
			<a href="/user/favorite" class="list-group-item">我的收藏</a>
			<a href="/user/score" 	 class="list-group-item">我的积分</a>
		</div>
	</div>

</div>

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
						<a href="/user/post?id=<?=$v['uid']?>">
							<img class="media-object" src="<?=$v['avatar']?>" alt="..." style="width: 4rem">
						</a>
					</div>
					<div class="media-body">
						<a href="/user/post?id=<?=$v['uid']?>"><?=$v['username']?></a>
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
