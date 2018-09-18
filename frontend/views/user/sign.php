<style>
	table{
		width: 100%
	}
	table tr th{
		width: 14%;
		font-size: 20px;
		text-align: center;
	}
	table tbody tr td  {
		padding: 0;
		text-align: center;
		height: 40px;
	}
	.red{
		color: red;

	}
	table tbody tr td span{
		color: #fff;
		font-weight: 400;
		/*border-radius: 50%;*/
		padding: 2px 0;
		width: 30px;
		display: inline-block;
		border: 1px solid transparent;
	}
	.black{
		color: black;
	}
	.bg-danger{
		background-color: #f13636;
	}

	.bg-success{
		background-color: #11a011;
	}

	blockquote.note{
		background-color: #fff3cd;
		border-color:#ffcb2f;
		color:#856404;
		font-size: 1rem;
	}


</style>
<div class="col-lg-3">
	<div class="list-group">
		<div class="list-group">
			<a href="/user/setting" class="list-group-item">账户设置</a>
			<a href="/user/notice"  class="list-group-item">我的提醒</a>
			<a href="/user/message" class="list-group-item">我的私信</a>
			<a href="/user/sign" 		 class="list-group-item active">我的签到</a>
			<a href="/user/post" 		 class="list-group-item">我的帖子</a>
			<a href="/user/favorite" class="list-group-item">我的收藏</a>
			<a href="/user/score" 	 class="list-group-item">我的积分</a>
		</div>
	</div>

</div>

<div class="col-lg-9">
		<h1>我的签到</h1>
		<div class="col-lg-6">
			<h1 style="display: inline-block"><?=$data['year'].'-'.$data['m']?></h1>
			<h5 class="" style="display: inline-block">
				<?php
				if ($data['m'] >= 12 ){
					$data['next']['m'] = '01';
					$data['next']['year'] = strval($data['year'] + 1);
				}else{
					$data['next']['year'] = strval($data['year']);
					$data['next']['m'] = $data['m'] + 1;
				}
				if ($data['m'] <= 1)
				{
					$data['prev']['m'] = '12';
					$data['prev']['year'] = strval($data['year'] - 1);
				}else{
					$data['prev']['year'] = strval($data['year']);
					$data['prev']['m'] = $data['m'] - 1;
				}
				?>
				<a href="/user/sign?year=<?=$data['prev']['year']?>&m=<?=$data['prev']['m']?>">上一个月</a>
				<a href="/user/sign?year=<?=$data['next']['year']?>&m=<?=$data['next']['m']?>">下一个月</a></h5>
			<table>
				<tr><th class="red">日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th class="red">六</th></tr>
				<tr>
					<?php if ($data['week_day'] != 7){
						for ($i=1; $i <= $data['week_day']; $i++){ ?>
<!--						空白位置-->
						<td></td>
					<?php }}?>
<!--					开始遍历天数-->
					<?php for ($i=1; $i <= $data['total_days']; $i++){?>
						<td><span class="
						<?php
							//三种情况 1.当前月份 2.小于当前月份 3.大于当前月份
						if (date('Y', time()) == $data['year'] && date('m', time()) == $data['m']){ //当前月份
								if ($i > $data['today']){
									echo 'black';
								}else if (($data['today'] - $i) <= 3 && ($data['today'] - $i) > 0 ){//补签计算
										if ( in_array($i, $sign_days)){
											echo 'bg-success';
										}else{
											echo 'bg-primary';
										}
								}else if (in_array($i, $sign_days)){
									echo 'bg-success';
								}else{
									echo 'bg-danger';
								}
							}
						if ($data['year'] < date('Y', time()) || (date('Y', time()) == $data['year'] && $data['m'] < date('m', time()))){ //小于当前月份
								if ( in_array($i, $sign_days)){
									echo 'bg-success';
								}else{
									echo 'bg-danger';
								}
						}

						if ($data['year'] > date('Y', time()) || (date('Y', time()) == $data['year'] && $data['m'] > date('m', time()))){ //大于当前月份
								echo 'black';
						}
							?>
						"><?=$i?></span>
					<?php
					    $data['week_day'] += 1;
						if ($data['week_day'] % 7 == 0){?>
							</tr><tr>
					<?php }}?>
				</tr>
			</table>
		</div>
		<div class="col-lg-6">
			<h1>签到统计</h1>
			<ul>
				<li>月签到天数：<?=$sign_statistics['m_count']?>天</li>
				<li>总签到天数：<?=$sign_statistics['count']?>天</li>
				<li>当月连续签到：<?=$sign_statistics['m_sign']?>天</li>
				<li>最多连续签到：<?=$sign_statistics['t_sign']?>天</li>
			</ul>
			<h1>补签记录</h1>
			<ul>
<!--				<li>已用补签卡数量：张</li>-->
<!--				<li>可用补签卡数量：张</li>-->
<!--				<li>失效补签卡数量：张</li>-->
				<blockquote class="note">补签说明：只能补签近3天的日期</blockquote>
			</ul>
		</div>
</div>

<script>
	var year = '<?=$data['year']?>';
	var m = '<?=$data['m']?>';
	$('table tbody tr td span.bg-primary').attr('data-placement', 'top').attr('title', '点击补签').css('cursor','pointer').on('click', function () {
		//补签ajax
		var param = year + m +$(this).html();
		//签到
		var url ='/user/sign-api';
			$.ajax({
				type: "Get",
				url: url,
				data:{'date':param},
				dataType: "json",
				success: function(msg){
					if(msg.data == true)
					{
						location.reload();
					}
				}
			});

	});
	$('table tbody tr td span.bg-danger').attr('data-placement', 'top').attr('title', '糟糕，没有签到');
	$('table tbody tr td span.bg-success').attr('data-placement', 'top').attr('title', '已签到');
	$(function () {
		$('table tbody tr td span').tooltip()
	})
</script>
