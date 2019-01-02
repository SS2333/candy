<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
$hash=password_hash($_POST['password'],PASSWORD_DEFAULT);
$sql = "insert into user(id,password,nickname,abstract) values(:id, :password, :nickname, :abstract);" ;
$query = $db->prepare($sql);
$query->bindParam(':id',$_POST['id'],PDO::PARAM_STR);
$query->bindParam(':password',$hash,PDO::PARAM_STR);
$query->bindParam(':nickname',$_POST['nickname'],PDO::PARAM_STR);
$query->bindParam(':abstract',$_POST['abstract'],PDO::PARAM_STR);

if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
	redirect_to("login.html");
};
?>