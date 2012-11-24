<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>積読書籍登録・編集</title>
<?php echo Asset::css(array('bootstrap.min.css', 'style.css')); ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>
<h1>積読書籍登録・編集</h1>
<a href="<?php echo Uri::create('book'); ?>">積読本を確認</a>　
<a href="<?php echo Uri::create('book/all'); ?>">すべての本を確認</a>
<hr>
<?php echo Form::open(); ?>
<table border="1">
<tr>
  <td width="150">積み日時</td>
  <td width="450"><?php echo Form::input('set_dttm', Input::post('set_dttm'), array('size' => 30)); ?></td>
</tr>
<tr>
  <td>読書日時</td>
  <td><?php echo Form::input('read_dttm', Input::post('read_dttm'), array('size' => 30)); ?></td>
</tr>
<tr>
  <td>書籍名</td>
  <td><?php echo Form::input('name', Input::post('name')); ?></td>
</tr>
<tr>
  <td>著者</td>
  <td><?php echo Form::input('auther', Input::post('auther')); ?></td>
</tr>
<tr>
  <td>大まかな内容</td>
  <td><?php echo Form::textarea('contents', Input::post('contents'), array('rows' => 5, 'cols' => 50)); ?></td>
</tr>
<tr>
  <td>感想・レビュー</td>
  <td><?php echo Form::textarea('review', Input::post('review'), array('rows' => 5, 'cols' => 50)); ?></td>
</tr>
<tr>
  <td colspan="2" class="txt-c" style="padding:5px;">
<?php echo Form::submit('submit', ' 登 録 ', array('class' => 'btn btn-large btn-success')); ?>
  </td>
</tr>
</table>
<?php echo Form::close(); ?>

<?php if($id): ?>
<script>
$(function(){
	$('#btn_delete').click(function(){
		if (confirm('このデータを削除してよろしいですか？この操作は取り消せません。')){
			$('#form_delete').submit();
		}
	});
});
</script>
<?php echo Form::input('del', ' 削除 ', array('type' => 'button', 'id' => 'btn_delete', 'class' => 'btn btn-danger')); ?>
<?php echo Form::open(array('action' => 'book/delete/', 'id' => 'form_delete')); ?>
<?php echo Form::hidden('id', $id); ?>
<?php echo Form::close(); ?>
<?php endif; ?>

</body>
</html>
