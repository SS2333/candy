<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>游戏 视频 改 </title>
    <link rel="shortcut icon"href="./图/G.ico"/>
</head>
<body>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT']. '/inc/db.php';
         $id = $_GET['id'];
        $query = $db->prepare('select * from posts2 where id = :id');
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $post = $query->fetchObject();
    ?>
	<h1>修改视频链接:</h1>

	<form action="update.php?a=<?php echo $_GET['a']?>" method="post">
		<input type="hidden" name="id" value = "<?php echo $id; ?>"/>
        <br/><label for="title">title</label>
		<input type="text" name="title" value="<?php echo $post->title ?>" /><br/>
        <br/>time<input type="text" name="time" value="<?php echo $post->time ?>" /><br/>
        <br/>备注<input type="text" name="exp" value="<?php echo $post->exp ?>" /><br/>
        <br>
        <label for="catalog_id">分类</label>
        <select name="catalog_id">
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
            $query = $db->query('select * from catalogries');
            while ($cata = $query->fetchObject()) {

                ?>
                <?php
                if(!empty($cata->name)){ ?>
                    <option value='<?php echo $cata->id; ?>'><?php echo $cata->name; ?></option>
                <?php }?>

            <?php }?>
        </select>
        <label for="catalog2_id"></label>
        <select name="catalog2_id">
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
            $query = $db->query('select * from catalogries2');
            while ($cata = $query->fetchObject()) {

                ?>
                <?php
                if(!empty($cata->name)){ ?>
                    <option value='<?php echo $cata->id; ?>'><?php echo $cata->name; ?></option>
                <?php }?>

            <?php }?>
        </select>
        <br/>
		<br/>
		<label for="body">link</label>
		<textarea name="body">
			<?php echo $post->body; ?>
		</textarea>
		<br/>
		<input type="submit" value="提交" />
        <td ><a href="index.php?a=<?php echo $_GET['a']; ?>">不想改了，返回上一页</a></td>
	</form>
</body>
</html>

