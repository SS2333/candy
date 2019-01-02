<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>new | 注册</title>
    <link rel="shortcut icon"href="../NAME/图/G.ico"/>
</head>
<body>
<h1>New user</h1>
<?php //$hash = md5('123654789');
    //echo $hash;?>
<form action="save.php" method="post">
    <p>账  号: <input type="text" name="id"></p>
    <p>密  码: <input type="password" name="password"></p>
    <p>用户名:<input type="text" name="nickname"></p>

    <br/>
    <label for="abstract">用户个人简介</label>
    <textarea name="abstract"></textarea>
    <br/>
    <input type="submit" value="提交" />
</form>

</body>
</html>