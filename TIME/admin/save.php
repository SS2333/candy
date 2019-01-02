<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/inc/db.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/inc/common.php';
$a=$_GET['a'];
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 20480000)   // 小于 20000 kb
    && in_array($extension, $allowedExts))
{
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    $filename = md5(time() . rand(0, 100)) .'.'.$extension;
    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" .$filename );
}
else
{
    echo "非法的文件格式";
}
if(empty($_GET_title)){
    redirect_to("./index.php?a=$a");
}

$sql = 	"insert into posts2(title,file,catalog_id,catalog2_id,time,exp,body) values(:title,:file,:catalog_id,:catalog2_id, :time, :exp, :body ) ;" ;
$a = $_GET{'a'};
$query = $db->prepare($sql);
var_export($dest);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':file',$filename,PDO::PARAM_STR);
$query->bindParam(':catalog_id',$_POST['catalog_id'],PDO::PARAM_INT);
$query->bindParam(':catalog2_id',$_POST['catalog2_id'],PDO::PARAM_INT);
$query->bindParam(':time',$_POST['time'],PDO::PARAM_STR);
$query->bindParam(':exp',$_POST['exp'],PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);

if (!$query->execute()) {
    print_r($query->errorInfo());
}else{

	    redirect_to("./index.php?a=$a");
};
?>