<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>delete | 删除</title>
    <link rel="shortcut icon"href="./图/G.ico"/>
</head>
<body>

	<?php $id = $_GET['id']; ?>
	<form action="destroy.php?a=<?php echo $_GET['a']?> " method="post">
		<input type="hidden" name="id" value = "<?php echo $id; ?>"/>

        是否删除这个素材?
		<input type="submit" value="确定">
	</form>
    <td ><a href="index.php">不想删了，返回上一页</a></td>
</body>
</html>