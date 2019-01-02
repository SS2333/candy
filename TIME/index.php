<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>游戏 视频</title>
    <link rel="shortcut icon"href="./图/G.ico"/>
</head>

<body>

<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';?>
<tr>
<p align="center"><img src="../图/GG.jpg "height="120" width="1200"></p>


    <?php if (isset( $_SESSION['id'] )){?>
        <h1 align="right">欢迎你<?php echo $_SESSION['id'] ?></a> 退出</h1>

    <?php }else{ ?>
        <h1 align="right"><a href="/LOGIN/login.html">请登陆</a></h1>

    <?php } ?>
</tr>
</body>

<body>
<table align="center" border=25 width="800px" ; style="font-size:40px;">
  <h1 align="center">选择筛选方法</h1>

    <tbody>
      <tr>
        <td><a href="admin/index.php?a=1">按名称筛选</a></td>

        <td><a href="admin/index.php?a=2">按时长筛选</a></td>
      </tr>
    </tbody>
  </table>
    <h1 align="center">最近上传</h1>
    &nbsp;&nbsp;
<?php
    require_once '../inc/db.php';
    $query = $db->query('select * from posts2  order by id desc limit 4');
    $query->execute();

    while ( $post =  $query->fetchObject() ) {?>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <a href="<?php echo $post->body; ?>"  target="_blank"><img src="./图/<?php echo $post->exp ?>.jpg "height="150" width="300"></a>

<?php  } ?>
</body>
</html>
