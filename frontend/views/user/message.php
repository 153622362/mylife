<style>
	.badge{
		background-color: lightcoral;
		border-radius: 0.25rem;
	}
</style>

<?=\common\widgets\UserNav::widget()?>

<div class="col-lg-9">
	<h1>我的私信</h1>
	<?php if (!empty($data)){
		foreach ($data as $v){
	?>
	<div class="media">
		<div class="media-left media-middle">
			<a href="<?=\common\utils\CreateUrl::createUrl('user/center',['id'=>$v['info']['id']])?>>">
				<img class="media-object" src="<?=$v['info']['avatar']?>" alt="..." style="width: 4rem">
			</a>
		</div>
		<div class="media-body">
			<h4 class="media-heading">
				<a href="<?=\common\utils\CreateUrl::createUrl('user/center',['id'=>$v['info']['id']])?>"><?=$v['info']['username']?>&nbsp;</a>
				<span class="badge"><?=$v['info']['count']?></span>
			</h4>
			<a href="<?=\common\utils\CreateUrl::createUrl('user/letter',['id'=>$v['info']['id']])?>"><blockquote><?=$v['content']?></blockquote></a>
		</div>
	</div>
	<?php }}?>
</div>
