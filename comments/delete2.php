<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>delete | 删除</title>
    <link rel="shortcut icon"href="./图/G.ico"/>
</head>
<body>	
	<?php $id = $_GET['id']; ?>
    <?php $Tid = $_GET['Tid']; ?>
	<form action="destroy2.php" method="post">
		<input type="hidden" name="id" value = "<?php echo $id; ?>"/>
        <input type="hidden" name="Tid" value = "<?php echo $Tid; ?>"/>
        是否删除这个评论?
		<input type="submit" value="确定">
	</form>
</body>
</html>