<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>连接传送门</title>
    <link rel="shortcut icon"href="./图/G.ico"/>
</head>
<body   >
  <?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
  require_once $_SERVER['DOCUMENT_ROOT']. '/inc/db.php';
    $query = $db->prepare('select * from posts2 where id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();
  ?>

  <h1>&nbsp;&nbsp;素材备注: <?php echo $post->title; ?>  </h1>
  <h3 >&nbsp;&nbsp;<a href="<?php echo $post->body; ?>"  target="_blank"> 开始播放 </h3>
  <h3 >&nbsp;&nbsp;<img src="./upload/<?php echo $post->file?> "height="320" width="500"> </a></h3>
  <p>&nbsp;&nbsp;时长：<?php echo $post->time; ?></p>
  <p>&nbsp;&nbsp;备注：这个链接是关于<?php echo $post->exp; ?>的。视频时长<?php echo $post->time; ?></p>
  <p>&nbsp;&nbsp;链接：<?php echo $post->body; ?></p>


  <td >&nbsp;&nbsp;<a href="index.php?a=1">返回上一页</a></td>

  <h1>&nbsp;&nbsp;用户评论</h1>
  <form action="/comments/save2.php" method="post">
      <input type="hidden" name='posts_id' value='<?php echo $_GET['id']; ?>'/>
      <?php
      if (isset( $_SESSION['id'] )){?>
      <input type="hidden" name="nickname" value=<?php echo $_SESSION['name']?> ; '/>
      <?php } else { ?>
      <input type="hidden" name="nickname" value='游客'; '/>
      <?php }?>
      <p>&nbsp;&nbsp;正文<textarea type="text" name="body" value="" /></textarea></p>

      &nbsp;&nbsp;<input type="submit" value="提交" />
  </form>

  <ol>
      <?php
      $query = $db->query('select * from comments where posts_id = ' . $_GET['id']);
      while ( $comment =  $query->fetchObject() ) {
          ?>
          &nbsp;&nbsp;
          <li>
              <p><?php echo $comment->body; ?></p>
              <p><?php echo $comment->time; ?><?php echo $comment->nickname; ?>
                  <?php if ( $_SESSION['p'] == 1){?>
                      || <a href="/comments/delete2.php?id=<?php echo $comment->id; ?>&Tid=<?php echo $comment->posts_id; ?>">删除</a>
                  <?php } ?></p>
          </li>

      <?php  } ?>

</body>
</html>
