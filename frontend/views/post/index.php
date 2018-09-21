<?php

$this->params['breadcrumbs'][] =['label'=>'动态','url'=>\yii\helpers\Url::to(['/dynamic/index'])];
$this->params['breadcrumbs'][] = $data['article_info']['title'];

?>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" xmlns="http://www.w3.org/1999/html">
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

	.pointer{
		cursor: pointer;
	}

	.title{
		word-break: keep-all;
		overflow: hidden;
		text-overflow: ellipsis
	}
	.inline-block{
		display: inline-block;
	}
	.img-avatar{
		width: 50px;
		border-radius: 50%;
	}
	.img-width{
		width: 4rem;
	}
	.share{
		width: 30px;
		border-radius: 50%;
	}
	.pointer{
		cursor: pointer;
	}
	.child-comment-avatr{
		width: 3rem;
	}
	.text1{
		display: none;
	}
	.publish{
		margin-top: 5px;
	}
	.table-width{
		width: 100%;
	}
	.report{
		padding: 10px;
	}
	.m0{
		margin: 0;
	}
	.mw200{
		max-width: 200px;
	}
	.title{
		text-overflow: ellipsis;
		display: inline-block;
		word-break: keep-all;
		overflow: hidden;
	}

	@-webkit-keyframes rotation{
		from {-webkit-transform: rotate(0deg);}
		to {-webkit-transform: rotate(360deg);}
	}
	.rotate:hover{
		-webkit-transform: rotate(360deg);
		animation: rotation 3s linear infinite;
		-moz-animation: rotation 3s linear infinite;
		-webkit-animation: rotation 3s linear infinite;
		-o-animation: rotation 3s linear infinite;
	}

</style>
<div class="row">
	<div class="col-lg-9">
<h1 class="title" title="<?=$data['article_info']['title']?>"><?=$data['article_info']['title']?></h1>
		<hr>
		<h4 class="text-muted">
			<span class="blue">
				<a href="/user/center?id=<?=$data['article_info']['author']?>" data-toggle="tooltip" data-placement="top" title="作者">🧑<?=$data['article_info']['username']?></a>&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
		<span class="blue">
			   <span data-toggle="tooltip" data-placement="top" title="创建时间">⏰<?=substr($data['article_info']['created_at'],0,10)?> </span>&nbsp;&nbsp;&nbsp;&nbsp;
		</span>
			<span class="blue">
				<span  data-toggle="tooltip" data-placement="top" title="文章浏览数!">🎃<?=$data['article_info']['visitor']?></span>&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
			<span class="blue">
				<span data-toggle="tooltip" data-placement="top" title="文章评论数!">📝</span> <?=$data['article_info']['ccom']?:0?> &nbsp;&nbsp;&nbsp;&nbsp;
			</span>
			<span class="blue">
				<span class=" pointer yellow <?php if (!empty($data['article_info']['ufav'])) echo 'text-success';?>" data-toggle="tooltip" data-placement="top" title="<?php echo !empty($data['article_info']['ufav'])?"已收藏":"收藏一下"?>" onclick="fav(this)"><?php echo !empty($data['article_info']['ufav'])?"🧡":"💛"; ?> <?=$data['article_info']['cfav']?:0?></span>&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
			<span class="pull-right">
		<span class="glyphicon glyphicon-thumbs-up pointer green <?php if (!empty($data['article_info']['ulike'])) echo 'text-success';?>"  data-toggle="tooltip" data-placement="top" title="点个赞!" onclick="zan(this)"><?=$data['article_info']['clike']?:0?></span>&nbsp;&nbsp;
<!--		<span class="glyphicon glyphicon-thumbs-down red" data-toggle="tooltip" data-placement="top" title="踩一下!">踩数</span>-->
				</span>
		</h4>
		<hr>
		<div>
			<?=$data['article_info']['content']?>
		</div>
		<hr>
		<div class="row">
			<?php if (!empty($data['article_info']['likeinfo'])){
				echo '	<h5>喜欢这篇文章的人</h5>';
				 foreach ($data['article_info']['likeinfo'] as $v){
				?>
					<a href="/user/center?id=<?=$v['id']?>" class="thumbnail inline-block" >
						<img src="<?=$v['avatar']?>" alt="..." class="img-avatar rotate">
					</a>
					<?php }}?>
		</div>
<!--		//分享-->
		<div class="row">
			<a href="#" class="thumbnail share"  data-toggle="tooltip" data-placement="top" title="微博分享">
				<img src="/static/img/logo.png" alt="..." >
			</a>
		</div>
<!--		文章标签-->
		<?php if (!empty($data['tag'])){ ?>
			<h3>文章标签</h3>
				<?php foreach ($data['tag'] as $k=>$v){ ?>
		<a href="/dynamic/index?tag=<?=$k?>" class="btn btn-success"><?=$v?></a>
		<?php }}?>
<!--		评论-->
		<h4>共 <span><?=$data['article_info']['ccom']?></span>条评论</h4>
		<hr>
		<div>
			<?php if (!empty($data['article_info']['cominfo'])){
				foreach ($data['article_info']['cominfo'] as $v){
					?>
			<div class="media" id="comment-<?=$v['id']?>">
				<div class="media-left">
					<a href="/user/center?id=<?=$v['uid']?>">
						<img class="media-object img-width" src="<?=$v['avatar']?>" alt="..."  >
					</a>
				</div>
				<div class="media-body">

					<div cid="<?=$v['id']?>" >
						<h4 class="media-heading" uid="<?=$v['uid']?>" id=""><a href="/user/center?id=<?=$v['uid']?>"><?=$v['username']?> </a><span class="text-muted">评论于<?=$v['created_at']?></span>
							<span class="pull-right glyphicon glyphicon-flag blue pointer"  data-toggle="tooltip" data-placement="top" title="举报此评论!" cid="<?=$v['id']?>">举报</span></h4>
						<h4><?=$v['content']?></h4>
						<h5 >
					<?php if (!empty(Yii::$app->user->id)){?>
						<span class="glyphicon glyphicon-share-alt blue pointer"  onclick="replyComment(this)">回复</span>
						<?php }?>
							<span class="pull-right">
								<span class="glyphicon glyphicon-thumbs-up green pointer<?php if (!empty($v['ulike'])) echo 'text-success'?>"  data-toggle="tooltip" data-placement="top" title="点个赞!" onclick="czan(this)"><?=$v['like']?> </span>
								<span class="glyphicon glyphicon-thumbs-down red pointer <?php if (!empty($v['uunlike'])) echo 'text-danger'?> "  data-toggle="tooltip" data-placement="top" title="踩一下!" onclick="cunzan(this)"><?=$v['unlike']?></span>
							</span>
						</h5>
						<?php if (!empty($v['child_comment'])){
								foreach ($v['child_comment'] as $vv){
							?>
							<div class="media" id="comment-<?=$vv['id']?>">
								<div class="media-left">
									<a href="/user/center?id=<?=$vv['uid']?>">
										<img class="media-object child-comment-avatr" src="<?=$vv['avatar']?>" alt="..." >
									</a>
								</div>
								<div class="media-body">
									<div cid="<?=$vv['id']?>">
										<h5 class="media-heading" uid="<?=$v['uid']?>" id="">
											<a href="/user/center?id=<?=$vv['uid']?>"><?=$vv['username']?> </a><span class="text-muted">回复于<?=$vv['created_at']?></span>
											<span class="pull-right">
												<span class="glyphicon glyphicon-thumbs-up green pointer<?php if (!empty($vv['ulike'])) echo 'text-success'?>" data-toggle="tooltip" data-placement="top" title="点个赞!" onclick="czan(this)"><?=$vv['like']?> </span>
												<span class="glyphicon glyphicon-thumbs-down red pointer <?php if (!empty($vv['uunlike'])) echo 'text-danger'?> "  data-toggle="tooltip" data-placement="top" title="踩一下!" onclick="cunzan(this)"><?=$vv['unlike']?></span>&nbsp;&nbsp;&nbsp;
												<span class="pull-right glyphicon glyphicon-flag blue pointer"  data-toggle="tooltip" data-placement="top" title="举报此评论!" cid="<?=$vv['id']?>">举报</span>
										</h5>

										</span>
										<h5 ><?=urldecode($vv['content'])?></h5>
									<?php if (!empty(Yii::$app->user->id)){?>
										<span class="glyphicon glyphicon-share-alt blue pointer"  onclick="replyChildComment(this)" username="<?=$vv['username']?>" uid="<?=$vv['uid']?>">回复</span>
										<?php }?>

										<h4 >

										</h4>
									</div>
								</div>
							</div>
						<?php }}?>
					</div>
				</div>
			</div>
			<?php }}?>
		</div>
		<?php if (!empty(Yii::$app->user->id)){?>
		<h2>
		发表评论
			<hr>
		</h2>
		<form action="" method="post" name="create-comment" style="z-index: 0">
			<div id="editor" >
				<p></p>
			</div>
			<textarea id="text1" name="content" class="text1" ></textarea>
			<input name="_csrf-frontend" type="hidden" id="_csrf-frontend" value="<?= Yii::$app->request->csrfToken ?>">
			<input name="post_id" type="hidden" id="_csrf-frontend" value="<?= Yii::$app->request->get('id') ?>">
			<button class="btn btn-primary publish" >发表</button>
		</form>
		<?php }else{?>
			<a href="/site/login" class="btn btn-primary">登陆后即可发言</a>
		<?php }?>
	</div>

	<div class="col-lg-3">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="media">
					<div class="media-left">
						<a href="/user/center?id=<?=$data['userinfo']['id']?>">
							<img class="media-object img-avatar" src="<?=$data['userinfo']['avatar']?>" alt="..." >
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
				<table class="table-width">
					<tr>
						<td>粉丝 <p><?=$data['userinfo']['cfan']?></p></td>
						<td>金钱 <p><?=$data['userinfo']['score']['wealth']?></p></td>
						<td>威望 <p><?=$data['userinfo']['score']['honor']?></p></td>
						<td>积分 <p><?=$data['userinfo']['score']['score']?></p></td>
					</tr>
				</table>
				<span class="btn <?php if (!empty($data['userinfo']['isfan'])){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-sm" <?php if (!empty($data['userinfo']['isfan'])){ echo 'disabled';}?> onclick="fan(this)" uid="<?=$data['userinfo']['id']?>"><?php if (!empty($data['userinfo']['isfan'])){ echo '已关注';}else{echo '关注';}?></span>&nbsp;
				<a href="/user/letter?id=<?=$data['userinfo']['id']?>" class="btn btn-primary btn-sm">私信</a>
			</div>
		</div>
		<div class="panel panel-default">
			<h4 class="panel-heading m0" >热门动态</h4>
			<div class="panel-body">
				<?php if (!empty($data['hotdy'])){
					foreach ($data['hotdy'] as $v){?>
						<p><a href="/post/index?id=<?=$v['id']?>" class="title mw200"><?=$v['title']?></a></p>
				<?php }}?>
			</div>
		</div>
	</div>
</div>

<!--<span data-toggle="modal" data-target="#myModal" id="Mdl">111</span>-->
<!-- Small modal -->

<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form name="report" class="report">
			请选中一个或多个原因
			<div class="input-group">
     		 <span class="input-group-addon">
        		<input type="checkbox" aria-label="..." name="reason" value="sq">
			 </span>
				<input type="text" class="form-control"  disabled aria-label="..." placeholder="色情">
			</div><!-- /input-group -->
			<div class="input-group">
     		 <span class="input-group-addon">
        		<input type="checkbox" aria-label="..." name="reason" value="bl">
			 </span>
				<input type="text" class="form-control" disabled aria-label="..." placeholder="语言暴力">
			</div><!-- /input-group -->
			<div class="input-group">
     		 <span class="input-group-addon">
        		<input type="checkbox" aria-label="..." name="reason" value="sy">
			 </span>
				<input type="text" class="form-control" disabled aria-label="..." placeholder="广告骚扰">
			</div><!-- /input-group -->
			<div class="input-group">
     		 <span class="input-group-addon">
        		<input type="checkbox" aria-label="..." name="reason" value="other">
			 </span>
				<input type="text" class="form-control" disabled aria-label="..." placeholder="其它">
			</div><!-- /input-group -->
			<button type="submit" class="btn btn-primary publish" id="report-comment" >提交</button>
			</form>
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
	var $text1 = $('#text1');
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
	editor.customConfig.onchange = function (html) {
		// 监控变化，同步更新到 textarea
		$text1.val(html)
	}
	editor.create();
	$text1.val(editor.txt.html())
	
	//回复评论
	function replyComment(param) {
		var form = $('form[name="replyCom"]');
		var cid = $(param).parent().parent().attr('cid');
		form.remove();
		var tmp = '<form action="" method="post" name="replyCom">' +
			'<textarea class="form-control" rows="3" style="resize: none" name="content"></textarea>' +
			'<input type="hidden" name="pid" value="' + cid + '">' +
			'<button class="btn btn-primary" style="margin-top: 5px" id="creply">发表</button>'+
			'</form>';
		$(param).parent().append(tmp);

		$('#creply').on('click',function (e) {
			e.preventDefault();
			var param = {
				reply_comment: encodeURI($('form[name="replyCom"]').serialize()),
				_csrf: csrfToken,
				post_id:post_id
			};
			var url = '/post/reply-comment';//收藏的的地址
			$.ajax({
				url: url,
				type: 'post',
				data: param,
				dataType: 'json',
				async: true,
				success: function (msg) {
					if (msg.data == true)
					{
						location.reload();
					}else {
						alert(msg.msg);
					}
				}

			});
		});
	}

	//回复子评论
	function replyChildComment(param) {
		var form = $('form[name="replyCom"]');
		var cid = $(param).parent().parent().parent().parent().attr('cid');
		var child_cid = $(param).parent().attr('cid');
		form.remove();
		var replyed_user = $(param).attr('uid');
		console.log(child_cid);
//		var init_comment = '@' + $(param).attr("username");
		var tmp = '<form action="" method="post" name="replyCom">' +
			'<textarea class="form-control" rows="3" style="resize: none" name="content"></textarea>' +
			'<input type="hidden" name="pid" value="' + cid + '">' +
			'<button class="btn btn-primary" style="margin-top: 5px" id="ccreply">发表</button>'+
			'</form>';
		$(param).parent().append(tmp);

		$('#ccreply').on('click',function (e) {
			e.preventDefault();
			var param = {
				reply_comment: encodeURI($('form[name="replyCom"]').serialize()),
				_csrf: csrfToken,
				post_id:post_id, //文章ID
				child_cid:child_cid,//子评论ID
				replyed_user:replyed_user //子评论作者
			};
			console.log(param);
			var url = '/post/reply-comment';//子评论
			$.ajax({
				url: url,
				type: 'post',
				data: param,
				dataType: 'json',
				async: true,
				success: function (msg) {
					if (msg.data == true)
					{
						location.reload();
					}else {
						alert(msg.msg);
					}
				}

			});
		});
	}

	//赞文章
	function zan(obj) {
		if($(obj).hasClass('text-success') == false){

			var param = {
				post_id:post_id,
			};
			var url = '/post/zan';//赞的地址
			$.ajax({
				url :url,
				type:'GET',
				data:param,
				dataType:'json',
				async: true,
				success: function(msg){
					$(obj).addClass('text-success');
					$(obj).html(parseInt($(obj).html()) + 1 );
				},
				error:function (msg) {
					alert(msg.responseText);
				}

			});
		}
	}
	//收藏文章
	function fav(obj) {
		if($(obj).hasClass('text-success') == false) {
			var param = {
				post_id: post_id,
			};
			var url = '/post/fav';//收藏的的地址
			$.ajax({
				url: url,
				type: 'GET',
				data: param,
				dataType: 'json',
				async: true,
				success: function (msg) {
						if (msg.data == true)
						{
							$(obj).addClass('text-success');
							console.log();
							$(obj).html("🧡" + (parseInt($(obj).html().substr(-1,1)) + 1));
						}
				}

			});
		}
	}
	//评论赞
	function czan(obj) {
		if($(obj).hasClass('text-success') == false) {
			var comment_id = $(obj).parent().parent().parent().attr('cid');
			var param = {
				comment_id: comment_id,
			};
			var url = '/post/c-like';//评论赞的的地址
			$.ajax({
				url: url,
				type: 'GET',
				data: param,
				dataType: 'json',
				async: true,
				success: function (msg) {
					if (msg.data == true)
					{
						$(obj).addClass('text-success');
						$(obj).html(parseInt($(obj).html()) + 1);
					}
				}

			});

		}
	}

	//评论踩
	function cunzan(obj) {
		if($(obj).hasClass('text-danger') == false) {
			var comment_id = $(obj).parent().parent().parent().attr('cid');
			var param = {
				comment_id: comment_id,
			};
			var url = '/post/c-un-like';//评论赞的的地址
			$.ajax({
				url: url,
				type: 'GET',
				data: param,
				dataType: 'json',
				async: true,
				success: function (msg) {
					if (msg.data == true)
					{
						$(obj).addClass('text-danger');
						$(obj).html(parseInt($(obj).html()) + 1);
					}
				}

			});
		}
	}

	var report_id = 0;
	//举报评论点击
	$('.glyphicon-flag').each(function () {
		$(this).on('click',function () {
			report_id = $(this).attr('cid');
			$('#myModal').modal({
				show: true
			})
		});
	})


	//评论举报
	$('#report-comment').on('click', function (e) {
		e.preventDefault();
		var form = $('form[name="report"]').serialize();
		var url = '/post/report';
		var param = {
			form: form,
			_csrf: csrfToken,
			comment_id:report_id
		}
		$.ajax({
			url: url,
			type: 'POST',
			data: param,
			dataType: 'json',
			async: true,
			success: function (msg) {
				console.log(msg)
			}

		});
		$('#myModal').modal('hide');

	})

	//关注
	function fan(param) {
		var uid = $(param).attr('uid');
		if ( $(param).hasClass('btn-success') == true)
		{
			var url = '/user/user-fan';
			var data = {
				uid: uid,
			}
			$.ajax({
				url: url,
				type: 'GET',
				data: data,
				dataType: 'json',
				async: true,
				success: function (msg) {
					console.log(msg)
					if ( msg.data == true){
						$(param).attr('disabled', true)
						$(param).removeClass('btn-success');
						$(param).addClass('btn-danger');
						$(param).html('已关注');
					}
				}

			});
		}

	}
</script>

