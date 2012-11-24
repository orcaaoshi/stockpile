<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>積読書籍一覧</title>
<?php echo Asset::css(array('bootstrap.min.css', 'style.css')); ?>
</head>
<body>
<h1>積読書籍一覧</h1>
<a href="<?php echo Uri::create('book/all'); ?>">すべての本を確認</a>　
<hr>
<a href="<?php echo Uri::create('book/edit'); ?>" class="btn btn-success">新規追加</a>
<?php echo $pagination; ?>
<table border="1">
<caption style="text-align:left;"><br>積読冊数：<?php echo $books_count; ?>冊</caption>
<tr style="background-color: lightgray;font-weight: bold;">
  <td width="120">積み日時</td>
  <td width="200">書籍名</td>
  <td width="150">著者</td>
  <td width="400">大まかな内容</td>
  <td width="80">編集</td>
</tr>
<?php foreach($books as $book): ?>
<tr>
  <td><?php echo date('Y/m/d H:i', strtotime($book['set_dttm'])); ?></td>
  <td><?php echo $book['name']; ?></td>
  <td><?php echo $book['auther']; ?></td>
  <td><?php echo nl2br($book['contents']); ?></td>
  <td class="txt-c"><a href="<?php echo Uri::create('book/edit/'.$book['id']); ?>" class="btn btn-primary">編集</a></td>
</tr>
<?php endforeach; ?>
</table>
<?php echo $pagination; ?>
</body>
</html>
