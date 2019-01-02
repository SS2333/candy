<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>游戏 视频 改 </title>
    <link rel="shortcut icon"href="./图/G.ico"/>
</head>
<body>
	<?php
		require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
		$id = $_GET['id'];
		if($_GET['a']==1){
        $query = $db->prepare('select * from catalogries where id = :id');}
        else{$query = $db->prepare('select * from catalogries2 where id = :id');}
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $post = $query->fetchObject();
	?>
	<h1>修改分类:</h1>

	<form action="update.php?a=<?php echo $_GET['a']?>" method="post">
		<input type="hidden" name="id" value = "<?php echo $id; ?>"/>

        <?php
             if(!empty($post->name)){?>
		<input type="text" name="name" value="<?php echo $post->name ?>" />
        <?php }?>

		<input type="submit" value="提交" />
        <td ><a href="index.php">不想改了，返回上一页</a></td>
	</form>
</body>
</html>