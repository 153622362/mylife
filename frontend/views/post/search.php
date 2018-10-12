<?php

$this->params['breadcrumbs'][] =['label'=>'搜索'];

?>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" xmlns="http://www.w3.org/1999/html">
<meta name="csrf-token" content="<?= \Yii::$app->request->csrfToken ?>">


<div class="site-contact">
<?php if (!empty($data)){
	foreach ($data as $v){
	?>
	<div class="media">
		<div class="media-left media-middle">
			<a href="/user/center?id=<?=$v['uid']?>">
				<img class="media-object avatar-width" src="<?=$v['avatar']?>" alt="" title="" data-toggle="tooltip" data-placement="bottom" style="width: 4rem">
			</a>
		</div>
		<div class="media-body">
			<h4 class="media-heading">
				<a href="/post/index?id=<?=$v['pid']?>" class="title mw360"><?=$v['title']?></a>
			</h4>
			<h5><?=\yii\helpers\Html::encode($v['descript'])?></h5>
			<h5 class="text-muted" title="创建时间"><?=$v['created_at']?></h5>
		</div>
	</div>
<?php } }else{?>
	<h1>目前还没有相关数据</h1>
	<?php }?>


</div>