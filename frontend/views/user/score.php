<div class="col-lg-3">

	<div class="list-group">
		<a href="/user/setting" class="list-group-item">账户设置</a>
		<a href="/user/notice"  class="list-group-item">我的提醒</a>
		<a href="/user/message" class="list-group-item">我的私信</a>
		<a href="/user/sign" 		 class="list-group-item">我的签到</a>
		<a href="/user/post" 		 class="list-group-item">我的帖子</a>
		<a href="/user/favorite" class="list-group-item">我的收藏</a>
		<a href="/user/score" 	 class="list-group-item active">我的积分</a>
	</div>

</div>

<div class="col-lg-9">
	<table class="table table-hover table-striped">
		<h1>我的积分</h1>
		<tr><th>积分变化说明</th><th>原因</th><th>时间</th></tr>
		<?php if (!empty($data)){
			foreach ($data as $v){
				$content = '';
				if ($v['score'] > 0)
				{
					$symbol = '+';
				}else{
					$symbol = '-';
				}
				switch ($v['category']){
					case 1://财富
						$content = '财富值'.$symbol.$v['score'];
						break;
					case 2: //威望
						$content = '威望值'.$symbol.$v['score'];
						break;
					case 3: //积分
						$content = '积分值'.$symbol.$v['score'];
						break;
				}
				?>
		<tr><td><?=$content?></td><td><?=$v['remark']?></td><td><?=$v['created_at']?></td></tr>
		<?php }}?>
	</table>
</div>
