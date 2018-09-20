<?php

$this->params['breadcrumbs'][] =['label'=>'聊天室','url'=>\yii\helpers\Url::to(['/site/index'])];
$this->params['breadcrumbs'][] = $data['chat_info']['content'];
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
		<h1 class="title" title="<?=$data['chat_info']['content']?>"><?=$data['chat_info']['content']?></h1>
		<hr>
		<h4 class="text-muted">
			<span class="blue">
				<a href="/user/center?id=<?=$data['chat_info']['user_id']?>" data-toggle="tooltip" data-placement="top" title="作者">🧑<?=$data['chat_info']['username']?></a>&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
			<span class="blue">
			   <span data-toggle="tooltip" data-placement="top" title="创建时间">⏰<?=substr($data['chat_info']['created_at'],0,10)?> </span>&nbsp;&nbsp;&nbsp;&nbsp;
		</span>
			<span class="blue">
				<span data-toggle="tooltip" data-placement="top" title="评论数">📝</span> <?=$data['ccom']?:0?> &nbsp;&nbsp;&nbsp;&nbsp;
			</span>

<!--			<span class="pull-right">-->
<!--		<span class="glyphicon glyphicon-thumbs-up pointer green --><?php //if (!empty($data['ulike'])) echo 'text-success';?><!--"  data-toggle="tooltip" data-placement="top" title="点个赞!" onclick="zan(this)">--><?//=$data['clike']?:0?><!--</span>&nbsp;&nbsp;-->
<!--				</span>-->
		</h4>
		<hr>
		<div>
			<?=$data['chat_info']['content']?>
		</div>
		<hr>
		<div class="row">
			<?php if (!empty($data['likeinfo'])){
				echo '	<h5>喜欢此内容的人</h5>';
				foreach ($data['likeinfo'] as $v){
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


		<!--		评论-->
		<h4>共 <span><?=$data['ccom']?></span>条评论</h4>
		<hr>
		<div>
			<?php if (!empty($data['cominfo'])){
				foreach ($data['cominfo'] as $v){
					?>
					<div class="media">
						<div class="media-left">
							<a href="/user/center?id=<?=$v['uid']?>">
								<img class="media-object img-width" src="<?=$v['avatar']?>" alt="..."  >
							</a>
						</div>
						<div class="media-body">

							<div cid="<?=$v['id']?>" >
								<h4 class="media-heading" uid="<?=$v['uid']?>" id=""><a href="/user/center?id=<?=$v['uid']?>"><?=$v['username']?> </a><span class="text-muted">评论于<?=$v['created_at']?></span>
								</h4>
								<h4><?=$v['content']?></h4>
								<?php if (!empty(Yii::$app->user->id)){?>
								<h5 >
									<span class="glyphicon glyphicon-share-alt blue pointer"  onclick="replyComment(this)">回复</span>
								</h5>
								<?php }?>
								<?php if (!empty($v['child_comment'])){
									foreach ($v['child_comment'] as $vv){
										?>
										<div class="media">
											<div class="media-left">
												<a href="/user/center?id=<?=$vv['uid']?>">
													<img class="media-object child-comment-avatr" src="<?=$vv['avatar']?>" alt="..." >
												</a>
											</div>
											<div class="media-body">
												<div cid="<?=$v['id']?>" ccid="<?=$vv['id']?>">
													<h5 class="media-heading" uid="<?=$v['uid']?>" id="">
														<a href="/user/center?id=<?=$vv['uid']?>"><?=$vv['username']?> </a><span class="text-muted">回复于<?=$vv['created_at']?></span>
														&nbsp;&nbsp;
													</h5>

													<h5 ><?=urldecode($vv['content'])?>
										<?php if (!empty(Yii::$app->user->id)){?>
												<span class="glyphicon glyphicon-share-alt blue pointer" style="display: block" onclick="replyComment(this)" username="<?=$vv['username']?>" uid="<?=$vv['uid']?>">回复</span>
										<?php }?>
													</h5>

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
		<form action="" method="post" name="create-comment">
			<div id="editor" >
				<p></p>
			</div>
			<textarea id="text1" name="content" class="text1" ></textarea>
			<input name="_csrf-frontend" type="hidden" id="_csrf-frontend" value="<?= Yii::$app->request->csrfToken ?>">
			<input name="chat_id" type="hidden" id="_csrf-frontend" value="<?= Yii::$app->request->get('id') ?>">
			<button class="btn btn-primary publish" >发表</button>
		</form>
		<?php }else{?>
			<a href="/site/login" class="btn btn-primary">登陆后即可发言</a>
		<?php }?>
	</div>

	<div class="col-lg-3">

	</div>




<script>
	var chat_id = "<?=Yii::$app->request->get('id')?>";
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
		var cid = $(param).parent().parent().attr('cid'); //chat_id
		var ccid = $(param).parent().parent().attr('ccid'); //chat_id
		form.remove(); //删除所有回复框
		var tmp = '<form action="" method="post" name="replyCom">' +
			'<textarea class="form-control" rows="3" style="resize: none" name="content"></textarea>' +
			'<input type="hidden" name="pid" value="' + cid + '">' +
			'<button class="btn btn-primary" style="margin-top: 5px" id="creply">发表</button>'+
			'</form>';
		$(param).parent().append(tmp); //重新建立回复框

		$('#creply').on('click',function (e) {
			e.preventDefault();
			var param = {
				reply_chat: $('form[name="replyCom"]').serialize(),
				_csrf: csrfToken,
				chat_id: chat_id,
				c_chat_id:ccid
			};
			var url = '/chat/reply-chat';//回复地址
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

	//赞
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
</script>

