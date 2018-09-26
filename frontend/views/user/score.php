<?=\common\widgets\UserNav::widget()?>


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
