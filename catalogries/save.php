<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';

 if($_GET['a']==1){
$sql = "insert into catalogries(name) values(:name );" ;}
else{$sql = "insert into catalogries2(name) values(:name );";}
$query = $db->prepare($sql);
$query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
	redirect_to("./");
};
?>