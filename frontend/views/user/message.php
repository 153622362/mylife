<style>
	.badge{
		background-color: lightcoral;
		border-radius: 0.25rem;
	}
</style>
<div class="col-lg-3">

	<div class="list-group">
		<div class="list-group">
			<a href="/user/setting" class="list-group-item">账户设置</a>
			<a href="/user/notice"  class="list-group-item">我的提醒</a>
			<a href="/user/message" class="list-group-item active">我的私信</a>
			<a href="/user/sign" 		 class="list-group-item">我的签到</a>
			<a href="/user/post" 		 class="list-group-item">我的帖子</a>
			<a href="/user/favorite" class="list-group-item">我的收藏</a>
			<a href="/user/score" 	 class="list-group-item">我的积分</a>
		</div>
	</div>

</div>

<div class="col-lg-9">
	<h1>我的私信</h1>
	<?php if (!empty($data)){
		foreach ($data as $v){
	?>
	<div class="media">
		<div class="media-left media-middle">
			<a href="/user/center?id=<?=$v['info']['id']?>">
				<img class="media-object" src="<?=$v['info']['avatar']?>" alt="..." style="width: 4rem">
			</a>
		</div>
		<div class="media-body">
			<h4 class="media-heading">
				<a href="/user/center?id=<?=$v['info']['id']?>"><?=$v['info']['username']?>&nbsp;</a><span class="badge"><?=$v['info']['count']?></span></h4>
			<a href="/user/letter?id=<?=$v['info']['id']?>"><blockquote><?=$v['content']?></blockquote></a>
		</div>
	</div>
	<?php }}?>
</div>
