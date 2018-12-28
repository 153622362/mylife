<?php
$this->title = '与'.$receiver->username.'私聊中';
?>
<?=\common\widgets\UserNav::widget()?>


<div class="col-lg-9">
	<h1>我的私信- <span style="font-size: 15px">与<?=$receiver->username?>私聊中...</span></h1>
	<?php if (!empty($data)){
		foreach ($data as $v){
			?>
			<div class="media">
				<div class="media-left media-middle">
					<a href="<?=\common\utils\CreateUrl::createUrl('user/center',['id'=>$v['uid']])?>">
						<img class="media-object" src="<?=$v['avatar']?>" alt="..." style="width: 4rem">
					</a>
				</div>
				<div class="media-body">
					<h4 class="media-heading">
						<a href="<?=\common\utils\CreateUrl::createUrl('user/center',['id'=>$v['uid']])?>"><?=$v['username']?></a>
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
