<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="UTF-8">
  <title>游戏 视频</title>
    <link rel="shortcut icon"href="../图/G.ico"/>
</head>

<table>
<ul>
    <table align="center" border=5 width="450px" ; style="font-size:20px;">
        <h1 align="center">现有名称分类</h1>
        <p align="right"><a href="../TIME/admin/index.php?a=1">返回首页</a></p>
        <tr>
            <th>分类</th>
            <th>操作</th>
        </tr>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
    $query = $db->query('select * from catalogries');
    while ($post = $query->fetchObject()) {
        ?>
        <?php
        if(!empty($post->name)){?>
            <tr>
            <td><?php echo $post->name; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $post->id; ?>&a=1">改</a>
                <a href="delete.php?id=<?php echo $post->id; ?>&a=1">删</a>
            </td>
            </tr>
        <?php }?>
    <?php }?>

</ul>
</table>
<ul>
    <table align="center" border=5 width="450px" ; style="font-size:20px;">
        <h1 align="center">现有时间分类</h1>
        <tr>
            <th>分类</th>
            <th>操作</th>
        </tr>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
        $query = $db->query('select * from catalogries2');
        while ($post = $query->fetchObject()) {
            ?>
            <?php
            if(!empty($post->name)){?>
                <tr>
                <td><?php echo $post->name; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $post->id; ?>&a=2">改</a>
                    <a href="delete.php?id=<?php echo $post->id; ?>&a=2">删</a>
                </td>
                </tr>
            <?php }?>
        <?php }?>

</ul>
</table>
<h1 align="center"><a href="new.php?a=1">新建名称分类</h1>
<h1 align="center"><a href="new.php?a=2">新建时间分类</h1>


</body>
</html>