<?php
$this->title = '与'.$receiver->username.'私聊中';
?>
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
	<h1>我的私信- <span style="font-size: 15px">与<?=$receiver->username?>私聊中...</span></h1>
	<?php if (!empty($data)){
		foreach ($data as $v){
			?>
			<div class="media">
				<div class="media-left media-middle">
					<a href="/user/center?id=<?=$v['uid']?>">
						<img class="media-object" src="<?=$v['avatar']?>" alt="..." style="width: 4rem">
					</a>
				</div>
				<div class="media-body">
					<h4 class="media-heading">
						<a href="/user/center?id=<?=$v['uid']?>"><?=$v['username']?></a>
						<span class="text-muted"><?=$v['created_at']?></span>
					</h4>
						<span><?=$v['content']?></span>
				</div>
			</div>
		<?php }}?>
	<form action="" method="post" name="letter" style="margin-top: 5px">
		<textarea class="form-control" rows="3" style="resize: none" name="content"></textarea>
		<input type="hidden" name="_csrf-frontend" id="_csrf-frontend" value="<?= Yii::$app->request->csrfToken ?>">
		<button class="btn btn-primary" style="margin-top: 5px" id="creply">发送</button>
	</form>
</div>
