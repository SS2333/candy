<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/inc/common.php';
$a = $_GET{'a'};
$id = $_POST['id'];
$sql = "update posts2 set title =  :title,catalog_id=:catalog_id,catalog2_id=:catalog2_id,time = :time,exp = :exp, body = :body where id = :id;" ;
$query = $db->prepare($sql);
$query->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':catalog_id',$_POST['catalog_id'],PDO::PARAM_INT);
$query->bindParam(':catalog2_id',$_POST['catalog2_id'],PDO::PARAM_INT);
$query->bindValue(':time',$_POST['time'],PDO::PARAM_STR);
$query->bindValue(':exp',$_POST['exp'],PDO::PARAM_STR);
$query->bindValue(':body',$_POST['body'],PDO::PARAM_STR);
echo $query->bindValue(':id',$id,PDO::PARAM_INT);
if (!$query->execute()) {
    print_r($query->errorInfo());
}else{
	redirect_to("show.php?id={$id}&a=$a");
};
?>
