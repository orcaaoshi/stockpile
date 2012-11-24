<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>積読リスト</title>
<?php echo Asset::css(array('bootstrap.min.css', 'style.css')); ?>
</head>
<body style="text-align:center;">
<h1>積読リスト管理</h1>
<hr>
<a href="<?php echo Uri::create('book'); ?>">積読本を確認</a>　
<a href="<?php echo Uri::create('book/all'); ?>">すべての本を確認</a>
</body>
</html>
