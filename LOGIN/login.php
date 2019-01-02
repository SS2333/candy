<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
session_start();
$query = $db->prepare('select * from user where id = :id');
$query->bindValue(':id',$_POST["id"],PDO::PARAM_INT);
$query->execute();
$post =  $query->fetchObject();
$hash= $post->password;
$p = $post->power;
if(password_verify($_POST["password"], $hash)){
    $_SESSION['id'] = $post->id;
    $_SESSION['name'] = $post->nickname;
    $_SESSION['p'] = $post->power;
    redirect_to("../TIME/index.php");
}else{
    redirect_to("./login.html");
};

?>