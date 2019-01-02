<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>new | 新建</title>
    <link rel="shortcut icon"href="./图/G.ico"/>
</head>
<body>
<h1>New post</h1>
<form action="save.php?a=<?php echo $_GET['a']?>" method="post" enctype="multipart/form-data">

    <br>
    <label for="title">title</label>
    <input type="text" name="title" value="" />
    <label for="file">文件名：</label>
    <input type="file" name="file" id="file"><br>
    <br>
    <br>
    <label for="catalog_id">分类</label>
    <select name="catalog_id">
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
        $query = $db->query('select * from catalogries');
        ?>
        <?php
        while ($post = $query->fetchObject()) {

            if(!empty($post->name)){ ?>
                <option value='<?php echo $post->id; ?>'><?php echo $post->name; ?></option>
            <?php }?>

        <?php }?>
    </select>
        <label for="catalog2_id"></label>
        <select name="catalog2_id">
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
            $query = $db->query('select * from catalogries2');
            ?>

        <?php
        while ($posts = $query->fetchObject()) {

            if(!empty($posts->name)){ ?>
                <option value='<?php echo $posts->id; ?>'><?php echo $posts->name; ?></option>
            <?php }?>

        <?php }?>

    </select>
    <br/>

    <br/>
    <label for="time">time</label>
    <input type="text" name="time" value="" />
    <label for="exp">备注</label>
    <input type="text" name="exp" value="" />
    <br/>

    <br/>
    <label for="body">body</label>
    <textarea name="body"></textarea>
    <br/>
    <input type="submit" value="提交" />
</form>

</body>
</html>