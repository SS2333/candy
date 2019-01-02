<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';

if(empty($_POST['body'])){
    $body='楼主很懒什么都没写';
} else{
    $body=$_POST['body'];
}
$sql = "insert into comments(posts_id,nickname, body) values(:posts_id, :nickname, :body);" ;
$query = $db->prepare($sql);
$query->bindParam(':posts_id',$_POST['posts_id'],PDO::PARAM_INT);
$query->bindParam(':nickname',$_POST['nickname'],PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
    redirect_to("/TIME/admin/show.php?&id=" . $_POST['posts_id']);
};
?>