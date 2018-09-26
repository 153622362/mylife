<?=\common\widgets\UserNav::widget()?>


<div class="col-lg-9">
	<div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#post" aria-controls="post" role="tab" data-toggle="tab">全部帖子</a></li>
			<li role="presentation"><a href="#turorial" aria-controls="turorial" role="tab" data-toggle="tab"><?=$category[0]['name']?></a></li>
			<li role="presentation"><a href="#extension" aria-controls="extension" role="tab" data-toggle="tab"><?=$category[1]['name']?></a></li>
			<li role="presentation"><a href="#origin-code" aria-controls="origin-code" role="tab" data-toggle="tab"><?=$category[2]['name']?></a></li>
			<li role="presentation"><a href="#question" aria-controls="question" role="tab" data-toggle="tab"><?=$category[3]['name']?></a></li>
			<li role="presentation"><a href="#topic" aria-controls="topic" role="tab" data-toggle="tab"><?=$category[4]['name']?></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content" style="margin-top: 5px">
			<div role="tabpanel" class="tab-pane active" id="post">
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
						<h4 class="media-heading">发表于<?=$v['created_at']?></h4>
						<a href="/post/index?id=<?=$v['pid']?>"><?=$v['title']?></a>
					</div>
				</div>
				<?php }}?>

			</div>

			<div role="tabpanel" class="tab-pane" id="turorial">
				<?php if (!empty($data)){
				foreach ($data as $v){
				 if ($v['post_category'] == 1){?>
					<div class="media">
						<div class="media-left media-middle">
							<a href="/post/index?id=<?=$v['uid']?>">
								<img class="media-object" src="<?=$v['avatar']?>" alt="..." style="width: 4rem">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">发表于<?=$v['created_at']?></h4>
							<a href="<?=$v['pid']?>"><?=$v['title']?></a>
						</div>
					</div>
				<?php }?>
				<?php }}?>

			</div>

			<div role="tabpanel" class="tab-pane" id="extension">
				<?php if (!empty($data)){
				foreach ($data as $v){
				 if ($v['post_category'] == 2){?>
					<div class="media">
						<div class="media-left media-middle">
							<a href="/post/index?id=<?=$v['uid']?>">
								<img class="media-object" src="<?=$v['avatar']?>" alt="..." style="width: 4rem">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">发表于<?=$v['created_at']?></h4>
							<a href="<?=$v['pid']?>"><?=$v['title']?></a>
						</div>
					</div>
				<?php }?>
				<?php }}?>

			</div>

			<div role="tabpanel" class="tab-pane" id="origin-code">
				<?php if (!empty($data)){
				foreach ($data as $v){
				if ($v['post_category'] == 3){?>
					<div class="media">
						<div class="media-left media-middle">
							<a href="/post/index?id=<?=$v['uid']?>">
								<img class="media-object" src="<?=$v['avatar']?>" alt="..." style="width: 4rem">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">发表于<?=$v['created_at']?></h4>
							<a href="<?=$v['pid']?>"><?=$v['title']?></a>
						</div>
					</div>
				<?php }?>
				<?php }}?>
			</div>
			<div role="tabpanel" class="tab-pane" id="question">
				<?php if (!empty($data)){
				foreach ($data as $v){
				if ($v['post_category'] == 4){?>
					<div class="media">
						<div class="media-left media-middle">
							<a href="/post/index?id=<?=$v['uid']?>">
								<img class="media-object" src="<?=$v['avatar']?>" alt="..." style="width: 4rem">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">发表于<?=$v['created_at']?></h4>
							<a href="<?=$v['pid']?>"><?=$v['title']?></a>
						</div>
					</div>
				<?php }?>
				<?php }}?>
			</div>

			<div role="tabpanel" class="tab-pane" id="topic">
				<?php if (!empty($data)){
				foreach ($data as $v){
				if ($v['post_category'] == 5){?>
					<div class="media">
						<div class="media-left media-middle">
							<a href="/post/index?id=<?=$v['uid']?>">
								<img class="media-object" src="<?=$v['avatar']?>" alt="..." style="width: 4rem">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">发表于<?=$v['created_at']?></h4>
							<a href="<?=$v['pid']?>"><?=$v['title']?></a>
						</div>
					</div>
				<?php }?>
				<?php }}?>
			</div>

		</div>
	</div>
<!--	<ul class="nav nav-tabs">-->
<!--		<li role="presentation" class="active"><a href="#">全部帖子</a></li>-->
<!--		<li role="presentation"><a href="#">教程</a></li>-->
<!--		<li role="presentation"><a href="#">扩展</a></li>-->
<!--		<li role="presentation"><a href="#">源码</a></li>-->
<!--	</ul>-->
</div>
