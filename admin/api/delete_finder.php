<?php
error_reporting(E_ALL || ~E_NOTICE);
$con=mysqli_connect("localhost","admin","admin","finding"); 
mysqli_set_charset($con, "utf8");
if (mysqli_connect_errno($con)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
}
$sql="DELETE FROM finder where id = '$_GET[id]'";
if(mysqli_query($con,$sql)){
	echo json_encode(array('flag'=>1));
	exit();
}else{
	echo json_encode(array('flag'=>0));
	exit();
}


?>