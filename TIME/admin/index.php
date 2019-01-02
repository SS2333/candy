
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>游戏 视频</title>
    <link rel="shortcut icon"href="./图/G.ico"/>
</head>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/inc/dh.php';?>
<body>
<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
if (!isset( $_SESSION['id'] )){
    $_SESSION['p'] =0;

}?>


<?php if($_GET['a']==1){?>

        <li><a class="dh" href="index.php ?a=1">All</a></li>

        <?php

        $query = $db->query('select * from catalogries');
        while ($post = $query->fetchObject()) {
            ?>
            <?php
            if(!empty($post->name)){?>
                <li><a class="dh" href="?catalog_id=<?php echo $post->id; ?>&a=1"><?php echo $post->name; ?></a></li>
            <?php }?>
        <?php }?>
        <li class="dh" ><a class="dh" href=""></a></li>
        <li ><a class="dh" href="index.php ?a=2">跳到按时长筛选</a></li>
        <?php if ( $_SESSION['p'] == 1){?>

            <li><a class="dh" href="/catalogries/index.php">修改建立新的分类</a></li>
            <li><a class="dh" href="new.php?a=1">新建</a></li>
        <?php }else{ ?>
            <li class="dh" ><a class="dh" href=""></a></li>
            <li class="dh" ><a class="dh" href=""></a></li><?php }?>
        <?php if (isset( $_SESSION['id'] )){?>
            <h1 align="right">欢迎你<?php echo $_SESSION['id'] ?></a></h1>

        <?php }else{ ?>

            <h1 align="right"><a href="/LOGIN/login.html">请登陆</a></h1>

        <?php } ?>

        </table>

    </ul>
    <table align="center" border=5 width="500px" ; style="font-size:20px;">
        <h1 align="center">按分类筛选</h1>
        <p align="center"><?php
        if(isset($_GET{'catalog_id'})){
            $query = $db->prepare('select * from catalogries where id = :catalog_id');
            $query->bindValue(':catalog_id',$_GET['catalog_id'],PDO::PARAM_INT);
            $query->execute();
            $post = $query->fetchObject();
            echo "当前分类为：", $post->name;
        }
        else{
            echo "当前分类为：All";
        }
        ?></p>
        <thead>
        <tr>
            <th>id</th>
            <th>素材详情</th>
            <th>时长</th>
            <th>说明-备注</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(!isset($_GET{'catalog_id'})){
            $query = $db->query('select count(*) as amount from posts2;');
            $row_amount = $query->fetchObject()->amount;
            require_once $_SERVER['DOCUMENT_ROOT'].'/inc/pager.php';

            $sql =  "select * from posts2  $page_sql";
        //echo $sql;
            $query  = $db->query($sql);
        }
        else{
            $query = $db->prepare('select count(*) as amount from posts2 where catalog_id = :catalog_id;');
            $query->bindValue(':catalog_id',$_GET['catalog_id'],PDO::PARAM_INT);
            $query->execute();
            $row_amount = $query->fetchObject()->amount;
            require_once $_SERVER['DOCUMENT_ROOT'].'/inc/pager.php';
            $cid=$_GET['catalog_id'];
            $sql =  "select * from posts2  where catalog_id = $cid LIMIT {$page_size} OFFSET {$row_base} ";
            //echo $sql;
            $query  = $db->query($sql);
            $query->execute();
        }
        while ( $post =  $query->fetchObject() ) {
            ?>


            <tr>
                <td><?php echo $row_base+++1 ?></td>
                <td><a href="show.php?id=<?php print $post->id; ?>&a=1"><img src="../图/<?php echo $post->exp; ?>.jpg "height="60" width="100"</a></td>
                <td><?php echo $post->time; ?></td>
                <td><?php echo $post->exp; ?></td>
                <td>
                    <a href="<?php echo $post->body; ?>"  target="_blank">点此观看</a>
                    <?php if ( $_SESSION['p'] == 1){?>
                        <a href="edit.php?id=<?php echo $post->id; ?>&a=1">改</a>
                        <a href="delete.php?id=<?php echo $post->id; ?>&a=1">删</a>
                    <?php } ?>
                </td>
            </tr>



        <?php  } ?>

        </tbody>

    </table>
    <div align="center" id="pager">
        <a href="?<?php echo $page_first_q ?>&a=1 ">首页</a>
        <a href="?<?php echo $page_previous_q ?>&a=1">上一页</a>
        <a href="?<?php echo $page_next_q ?>&a=1">下一页</a>
        <a href="?<?php echo $page_last_q ?>&a=1">末页</a>
        <span>当前第 <?php echo $page_current ?>  页</span>
        <span>总共 <?php echo $page_amount ?> 页</span>
    </div>
<?php }?>

<?php if($_GET['a']==2){?>
<ul>
    <li><a class="dh" href="index.php ?a=2   ">All</a></li>
    <?php

    $query = $db->query('select * from catalogries2');
    while ($post = $query->fetchObject()) {
        ?>
        <?php
        if(!empty($post->name)){?>
            <li><a class="dh" href="?catalog2_id=<?php echo $post->id; ?>&a=2"><?php echo $post->name; ?></a></li>
        <?php }?>
    <?php }?>
    <li><a class="dh" href="index.php ?a=1">跳到按名称筛选</a></li>
    <?php if ( $_SESSION['p'] == 1){?>
        <li><a class="dh" href="/catalogries/index.php">修改建立新的分类</a></li>
        <li><a class="dh" href="new.php?a=2">新建</a></li>
    <?php } else{ ?>
        <li class="dh" ><a class="dh" href=""></a></li>
        <li class="dh" ><a class="dh" href=""></a></li><?php }?>
    <?php if (isset( $_SESSION['id'] )){?>
        <h1 align="right">欢迎你<?php echo $_SESSION['id'] ?></a></h1>

    <?php }else{ ?>
        <h1 align="right"><a href="/LOGIN/login.html">请登陆</a></h1>

    <?php } ?>
</ul>
<table align="center" border=5 width="500px" ; style="font-size:20px;">
  <h1 align="center">按时长筛选</h1>
    <p align="center"><?php
    if(isset($_GET{'catalog2_id'})){
        $query = $db->prepare('select * from catalogries2 where id = :catalog2_id');
        $query->bindValue(':catalog2_id',$_GET['catalog2_id'],PDO::PARAM_INT);
        $query->execute();
        $post = $query->fetchObject();
        echo "当前分类为：", $post->name;
    }
    else{
        echo "当前分类为：All";
    }
    ?></p>
    <thead>
      <tr>
        <th>id</th>
        <th>素材详情</th>
          <th>时长</th>
          <th>说明-备注</th>
          <th>操作</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if(!isset($_GET{'catalog2_id'})){
        $query = $db->query('select count(*) as amount from posts2;');
        $row_amount = $query->fetchObject()->amount;
        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/pager.php';

        $sql =  "select * from posts2  $page_sql";
        //echo $sql;
        $query  = $db->query($sql);
    }
    else{
        $query = $db->prepare('select count(*) as amount from posts2 where catalog2_id = :catalog2_id;');
        $query->bindValue(':catalog2_id',$_GET['catalog2_id'],PDO::PARAM_INT);
        $query->execute();
        $row_amount = $query->fetchObject()->amount;
        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/pager.php';
        $cid=$_GET['catalog2_id'];
        $sql =  "select * from posts2 where catalog2_id = $cid $page_sql ";
        //echo $sql;
        $query  = $db->query($sql);
        $query->execute();
    }

         while ( $post =  $query->fetchObject() ) {
      ?>


    <tr>
      <td><?php echo $row_base+++1 ?></td>
      <td><a href="show.php?id=<?php print $post->id; ?>&a=2"><img src="../图/<?php echo $post->exp; ?>.jpg "height="60" width="100"</a></td>
        <td><?php echo $post->time; ?></td>
        <td><?php echo $post->exp; ?></td>
      <td>
        <a href="<?php echo $post->body; ?>"  target="_blank">点此观看</a>
          <?php if ( $_SESSION['p'] == 1){?>
              <a href="edit.php?id=<?php echo $post->id; ?>&a=2">改</a>
              <a href="delete.php?id=<?php echo $post->id; ?>&a=2">删</a>
          <?php } ?>
      </td>
    </tr>



    <?php  } ?>

    </tbody>
  </table>
    <div align="center" id="pager">
        <a href="?<?php echo $page_first_q ?>&a=2 ">首页</a>
        <a href="?<?php echo $page_previous_q ?>&a=2">上一页</a>
        <a href="?<?php echo $page_next_q ?>&a=2">下一页</a>
        <a href="?<?php echo $page_last_q ?>&a=2">末页</a>
        <span>当前第 <?php echo $page_current ?>  页</span>
        <span>总共 <?php echo $page_amount ?> 页</span>
    </div>

<?php }?>
</body>
</html>
