<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>new  | 新建分类</title>
    <link rel="shortcut icon"href="./图/G.ico"/>
</head>
<body>
<h1>新的 分类</h1>

<form action="save.php?a=<?php echo $_GET['a']?>" method="post">
    <?php
    if($_GET['a']==1){
    ?>
    <br/>
    <label for="name">新分类名称</label>
    <input type="text" name="name" value="" />

    <br/>
    <?php }?>
    <?php
    if($_GET['a']==2) {
    ?>
    <br/>
    <label for="name">新时间分类</label>
    <input type="text" name="name" value="" />

    <br/>
    <?php }?>
    <input type="submit" value="提交" />
</form>

</body>
</html>