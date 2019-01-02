<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/common.php';
$id = $_POST['id'];
if($_GET['a']==1){
$sql = "update catalogries set name = :name where id = :id;" ;}
else{
    $sql = "update catalogries2 set name = :name where id = :id;" ;
}
$query = $db->prepare($sql);
$query->bindValue(':name',$_POST['name'],PDO::PARAM_STR);
echo $query->bindValue(':id',$id,PDO::PARAM_INT);
if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
    redirect_to("./index.php?id={$id}");
};
?>