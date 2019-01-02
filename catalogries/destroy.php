<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
if($_GET['a']==1){$sql = "delete from catalogries where id = :id" ;}
else{$sql = "delete from catalogries2 where id = :id" ;}
$query = $db->prepare($sql);

$query->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
	redirect_to("./");
};
?>