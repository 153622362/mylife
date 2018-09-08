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
				<span class="glyphicon glyphicon-list-alt blue" data-toggle="tooltip" data-placement="top" title="文章评论数!"></span> <?=$data['ccom']?:0?> &nbsp;&nbsp;&nbsp;&nbsp;
			</span>
			<span class="blue">
				<span class="glyphicon glyphicon-star-empty pointer yellow <?php if (!empty($data['ufav'])) echo 'text-success';?>" data-toggle="tooltip" data-placement="top" title="收藏一下!" onclick="fav(this)"><?=$data['cfav']?:0?></span>&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
			<span class="pull-right">
		<span class="glyphicon glyphicon-thumbs-up pointer green <?php if (!empty($data['ulike'])) echo 'text-success';?>"  data-toggle="tooltip" data-placement="top" title="点个赞!" onclick="zan(this)"><?=$data['clike']?:0?></span>&nbsp;&nbsp;
<!--		<span class="glyphicon glyphicon-thumbs-down red" data-toggle="tooltip" data-placement="top" title="踩一下!">踩数</span>-->
				</span>
		</h4>
		<hr>
		<div>
			<?=$data['article_info']['content']?>
		</div>
		<hr>
		<div class="row">
			<?php if (!empty($data['likeinfo'])){
				echo '	<h5>喜欢这篇文章的人</h5>';
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
						<h4 class="media-heading" uid="<?=$v['uid']?>" id=""><a href="/user/center?id=<?=$v['uid']?>"><?=$v['username']?> </a><span class="text-muted">评论于<?=$v['created_at']?></span>
							<span class="pull-right glyphicon glyphicon-flag blue" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="举报此评论!" cid="<?=$v['id']?>">举报</span></h4>
						<h4><?=$v['content']?></h4>
						<h5 >
							<span class="glyphicon glyphicon-share-alt blue" style="cursor: pointer" onclick="replyComment(this)">回复</span>
							<span class="pull-right">
								<span class="glyphicon glyphicon-thumbs-up green <?php if (!empty($v['ulike'])) echo 'text-success'?>" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="点个赞!" onclick="czan(this)"><?=$v['like']?> </span>
								<span class="glyphicon glyphicon-thumbs-down red pointer <?php if (!empty($v['uunlike'])) echo 'text-danger'?> "  data-toggle="tooltip" data-placement="top" title="踩一下!" onclick="cunzan(this)"><?=$v['unlike']?></span>
							</span>
						</h5>
						<?php if (!empty($v['child_comment'])){
								foreach ($v['child_comment'] as $vv){
							?>
							<div class="media">
								<div class="media-left">
									<a href="/user/center?id=<?=$vv['uid']?>">
										<img class="media-object" src="<?=$vv['avatar']?>" alt="..." style="width: 2rem">
									</a>
								</div>
								<div class="media-body">
									<div cid="<?=$vv['id']?>">
										<h5 class="media-heading" uid="<?=$v['uid']?>" id="">
											<a href="/user/center?id=<?=$vv['uid']?>"><?=$vv['username']?> </a><span class="text-muted">回复于<?=$vv['created_at']?></span>
											<span class="pull-right">
												<span class="glyphicon glyphicon-thumbs-up green <?php if (!empty($vv['ulike'])) echo 'text-success'?>" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="点个赞!" onclick="czan(this)"><?=$vv['like']?> </span>
												<span class="glyphicon glyphicon-thumbs-down red pointer <?php if (!empty($vv['uunlike'])) echo 'text-danger'?> "  data-toggle="tooltip" data-placement="top" title="踩一下!" onclick="cunzan(this)"><?=$vv['unlike']?></span>&nbsp;&nbsp;&nbsp;
												<span class="pull-right glyphicon glyphicon-flag blue" style="cursor: pointer" data-toggle="tooltip" data-placement="top" title="举报此评论!" cid="<?=$vv['id']?>">举报</span>
										</h5>

										</span>
										<h5 style="margin: 0"><?=urldecode($vv['content'])?></h5>
										<span class="glyphicon glyphicon-share-alt blue" style="cursor: pointer" onclick="replyChildComment(this)" username="<?=$vv['username']?>" uid="<?=$vv['uid']?>">回复</span>

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
		<h2>
		发表评论
			<hr>
		</h2>
		<form action="" method="post" name="create-comment">
			<div id="editor" >
				<p></p>
			</div>
			<textarea id="text1" name="content" style="display: none" ></textarea>
			<input name="_csrf-frontend" type="hidden" id="_csrf-frontend" value="<?= Yii::$app->request->csrfToken ?>">
			<button class="btn btn-primary" style="margin-top: 5px">发表</button>
		</form>
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
				<span class="btn <?php if (!empty($data['isfan'])){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-sm" <?php if (!empty($data['isfan'])){ echo 'disabled';}?> onclick="fan(this)" uid="<?=$data['userinfo']['id']?>"><?php if (!empty($data['isfan'])){ echo '已关注';}else{echo '关注';}?></span>&nbsp;
<!--				<span class="btn btn-primary btn-sm">私信</span>-->
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

<!--<span data-toggle="modal" data-target="#myModal" id="Mdl">111</span>-->
<!-- Small modal -->

<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form name="report" style="padding: 10px">
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
			<button type="submit" class="btn btn-primary" id="report-comment" style="margin-top: 5px">提交</button>
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
//		var init_comment = '@' + $(param).attr("username");
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
				post_id:post_id, //文章ID
				child_cid:child_cid,//子评论ID
				replyed_user:replyed_user //子评论作者
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
							$(obj).html(parseInt($(obj).html()) + 1);
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

