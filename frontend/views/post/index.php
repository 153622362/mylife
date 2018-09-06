<?php

$this->params['breadcrumbs'][] = 'xxx';

?>
<meta http-equiv=Content-Type content=text/html;charset=UTF-8 xmlns="http://www.w3.org/1999/html">
<meta name="csrf-token" content="<?= \Yii::$app->request->csrfToken ?>">
<script src="https://unpkg.com/wangeditor@3.1.1/release/wangEditor.min.js"></script>
<style>
	.red:hover{
		color: red;
	}
	.green:hover{
		color: green;
	}
	.blue:hover{
		color: #00b3ee;
		cursor: pointer;
	}
	.yellow:hover{
		color: yellow;
	}
	.pointer{
		cursor: pointer;
	}
</style>
<div class="row">
	<div class="col-lg-9">
<h1 style="word-break: keep-all" title="<?=$data['article_info']['title']?>"><?=$data['article_info']['title']?></h1>
		<hr>
		<h4 class="text-muted">
			<span class="blue">
				<span class="glyphicon glyphicon-user "><?=$data['article_info']['username']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
		<span class="blue">
			   <span class="glyphicon glyphicon-time blue"><?=substr($data['article_info']['created_at'],0,10)?> </span>&nbsp;&nbsp;&nbsp;&nbsp;
		</span>
			<span class="blue">
				<span class="glyphicon glyphicon-eye-open blue" data-toggle="tooltip" data-placement="top" title="文章浏览数!"><?=$data['article_info']['visitor']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
			<span class="blue">
				<span class="glyphicon glyphicon-list-alt blue" data-toggle="tooltip" data-placement="top" title="文章评论数!"></span> <?=$data['article_info']['ccom']?:0?> &nbsp;&nbsp;&nbsp;&nbsp;
			</span>
			<span class="blue">
				<span class="glyphicon glyphicon-star-empty pointer yellow" data-toggle="tooltip" data-placement="top" title="收藏一下!" onclick="fav(this)"><?=$data['article_info']['cfave']?:0?></span>&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
			<span class="pull-right">
		<span class="glyphicon glyphicon-thumbs-up green" data-toggle="tooltip" data-placement="top" title="点个赞!" onclick="zan(this)"><?=$data['article_info']['clike']?:0?></span>&nbsp;&nbsp;
<!--		<span class="glyphicon glyphicon-thumbs-down red" data-toggle="tooltip" data-placement="top" title="踩一下!">踩数</span>-->
				</span>
		</h4>
		<hr>
		<div>
			<?=$data['article_info']['content']?>
		</div>
		<hr>
		<div class="row">
				<h5>喜欢这篇文章的人</h5>
			<?php if (!empty($data['likeinfo'])){
				 foreach ($data['likeinfo'] as $v){
				?>
					<a href="#" class="thumbnail" style="display: inline-block"">
						<img src="<?=$v['avatar']?>" alt="..." style="width: 50px;border-radius: 50%;">
					</a>
					<?php }}?>
		</div>
		<div class="row">
			<a href="#" class="thumbnail" style="width: 40px;border-radius: 50%;display: inline-block" data-toggle="tooltip" data-placement="top" title="微博分享">
				<img src="/static/img/logo.png" alt="...">
			</a>
		</div>
		<h4>共 <span><?=$data['ccom']?></span>条评论</h4>
		<hr>
		<div>
			<?php if (!empty($data['cominfo'])){
				foreach ($data['cominfo'] as $v){
					?>
			<div class="media">
				<div class="media-left">
					<a href="/user/center?id=<?=$v['uid']?>">
						<img class="media-object" src="<?=$v['avatar']?>" alt="..." style="width: 4rem">
					</a>
				</div>
				<div class="media-body">
					<div cid="<?=$v['id']?>">
						<h4 class="media-heading" uid="<?=$v['uid']?>" id=""><a href="/user/center?id=<?=$v['uid']?>"><?=$v['username']?> </a><span class="text-muted">评论于<?=$v['created_at']?></span> <span class="pull-right glyphicon glyphicon-flag blue" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="举报此评论!">举报</span></h4>
						<h3><?=$v['content']?></h3>
						<h4 >
							<span class="glyphicon glyphicon-share-alt blue" style="cursor: pointer" onclick="replyComment(this)">回复</span>
							<span class="pull-right">
								<span class="glyphicon glyphicon-thumbs-up green" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="点个赞!" onclick="czan(this)"><?=$v['like']?> </span>
								<span class="glyphicon glyphicon-thumbs-down red" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="踩一下!" onclick="cunzan(this)"><?=$v['unlike']?></span>
							</span>
						</h4>
					</div>
				</div>
			</div>

			<?php }}?>
		</div>
		<h2>
		发表评论
			<hr>
		</h2>
		<div id="editor">
			<p></p>
		</div>
		<button class="btn btn-primary" style="margin-top: 5px">发表</button>
	</div>

	<div class="col-lg-3">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="media">
					<div class="media-left">
						<a href="/user/center?id=<?=$data['userinfo']['id']?>">
							<img class="media-object" src="<?=$data['userinfo']['avatar']?>" alt="..." style="width: 4rem">
						</a>
						<h6 class="badge badge-primary">见习主管</h6>
					</div>
					<div class="media-body">
						<h3 class="media-heading" title="<?=$data['userinfo']['username']?>"><a href="/user/center?id=<?=$data['userinfo']['id']?>"><?=$data['userinfo']['username']?></a></h3>
						<h5>注册时间：<?=date('Y-m-d', $data['userinfo']['created_at'])?></h5>
						<h5>最后登陆：<?=substr($data['userinfo']['last_log_in'], 0, 10)?></h5>
						<h5>地区：<?=$data['userinfo']['city']?></h5>
					</div>
				</div>
				<table style="width: 100%">
					<tr>
						<td>粉丝 <p><?=$data['cfan']?></p></td>
						<td>金钱 <p><?=$data['userinfo']['wealth_score']?></p></td>
						<td>威望 <p><?=$data['userinfo']['honor_score']?></p></td>
						<td>积分 <p><?=$data['userinfo']['score']?></p></td>
					</tr>
				</table>
				<span class="btn btn-success btn-sm">关注</span>&nbsp;<span class="btn btn-primary btn-sm">私信</span>
			</div>
		</div>
		<div class="panel panel-default">
			<h4 class="panel-heading" style="margin: 0">热门动态</h4>
			<div class="panel-body">
				<?php if (!empty($data['hotdy'])){
					foreach ($data['hotdy'] as $v)?>
				<a href="/post/index?id=<?=$v['id']?>"><?=$v['title']?></a>
				<?php }?>
			</div>
		</div>
	</div>
</div>

<script>
	var post_id = "<?=Yii::$app->request->get('id',0)?>";
	var csrfToken = $('meta[name="csrf-token"]').attr("content");

	//bootstrap提示
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})

	//编辑器
	var E = window.wangEditor;
	var editor = new E('#editor');
	// 或者 var editor = new E( document.getElementById('editor') )
	editor.customConfig.menus = [
		'head',  // 标题
		'fontSize',  // 字号
		'quote',  // 引用
		'code',  // 插入代码
		'emoticon',  // 表情
		'undo',  // 撤销
		'redo'  // 重复
	];
	editor.create();
	
	//回复评论
	function replyComment(param) {
		var form = $('form[name="replyCom"]');
		form.remove();
//		if (form.length == 0){
		var tmp = '<form action="" method="post" name="replyCom">' +
			'<textarea class="form-control" rows="3" style="resize: none"></textarea><button class="btn btn-primary" style="margin-top: 5px">发表</button>'+
			'</form>';
		$(param).parent().parent().append(tmp);
//		}else {
//		}
	}

	//赞文章
	function zan(obj) {
		$(obj).addClass('text-success');
		$(obj).html(parseInt($(obj).html()) + 1 );
		var param = {
			post_id:post_id,
		};
		var url = '';//赞的地址
		$.ajax({
			url :url,
			type:'GET',
			data:param,
			dataType:'json',
			async: true,
			success: function(msg){

			}

		});
	}

	//收藏文章
	function fav(obj) {
		$(obj).addClass('text-success');
		$(obj).html(parseInt($(obj).html()) + 1 );
		var param = {
			post_id:post_id,
		};
		var url = '';//收藏的的地址
		$.ajax({
			url :url,
			type:'GET',
			data:param,
			dataType:'json',
			async: true,
			success: function(msg){

			}

		});
	}

	//评论赞
	function czan(obj) {
		$(obj).addClass('text-success');
		$(obj).html(parseInt($(obj).html()) + 1 );
	}

	//评论踩
	function cunzan(obj) {
		$(obj).addClass('text-danger');
		$(obj).html(parseInt($(obj).html()) + 1 );
	}

	//评论举报
	function inform(obj) {
		
	}


</script>