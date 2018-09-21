<script src="https://unpkg.com/wangeditor@3.1.1/release/wangEditor.min.js"></script>

<?php $form = \yii\bootstrap\ActiveForm::begin(['id' => 'contact-form']); ?>
<div class="row">
	<div class="form-group" >
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
</div>

<div class="row">
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-1" style="z-index: 0">
			<div id="editor" >
				<p></p>
			</div>
		</div>

	</div>
</div>
	<textarea id="text1" name="content" style="display: none" ></textarea>
	<input name="_csrf-frontend" type="hidden" id="_csrf-frontend" value="<?= Yii::$app->request->csrfToken ?>">
	<?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className(), [
//		'captchaAction'=>'post/captcha',
		'imageOptions'=>['alt'=>'点击换图','title'=>'点击换图', 'style'=>'cursor:pointer'],
		'template' => '<div class="row"><div class="col-lg-offset-1 col-lg-2">{image}</div><div class="col-lg-3">{input}</div></div>',
	])->label('') ?>
	<div class="form-group">
		<div class="col-sm-offset-1 col-sm-10">
			<button type="submit" class="btn btn-default">发布</button>
		</div>
	</div>
<?php \yii\bootstrap\ActiveForm::end(); ?>

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