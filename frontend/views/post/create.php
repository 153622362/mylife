<script src="https://unpkg.com/wangeditor@3.1.1/release/wangEditor.min.js"></script>

<form class="form-horizontal" action="" method="post">
	<div class="form-group">
<!--		<label for="inputTitle" class="col-sm-2 control-label">文章标题</label>-->
		<div class="col-sm-8 col-sm-offset-1">
			<input type="text" class="form-control" id="inputTitle" name="title" placeholder="文章标题">
		</div>
		<div class="col-lg-2">
				<select class="form-control" name="category" data-toggle="tooltip" data-placement="top" title="文章分类">
					<?php foreach ($category as $v){?>
						<option value="<?=$v['id']?>"><?=$v['name']?></option>
					<?php }?>
				</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-1">
			<div id="editor" >
				<p></p>
			</div>
		</div>

	</div>
	<textarea id="text1" name="content" style="display: none" ></textarea>
	<input name="_csrf-frontend" type="hidden" id="_csrf-frontend" value="<?= Yii::$app->request->csrfToken ?>">
	<div class="form-group">
		<div class="col-sm-offset-1 col-sm-10">
			<button type="submit" class="btn btn-default">发布</button>
		</div>
	</div>
</form>

<script>
	//bootstrap提示
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
	//编辑器
	var E = window.wangEditor;
	var editor = new E('#editor');
	var $text1 = $('#text1');
	editor.customConfig.onchange = function (html) {
		// 监控变化，同步更新到 textarea
		$text1.val(html)
	}
	editor.create();
	$text1.val(editor.txt.html())
</script>