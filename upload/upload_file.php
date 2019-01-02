<?php
// 允许上传的图片后缀
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


    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $filename);

}
else
{
    echo "非法的文件格式";
}
?>