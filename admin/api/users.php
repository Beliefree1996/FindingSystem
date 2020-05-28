<?php
error_reporting(E_ALL || ~E_NOTICE);
$con=mysqli_connect("localhost","admin","admin","finding"); 
mysqli_set_charset($con, "utf8");
if (mysqli_connect_errno($con)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
}
$pageCount=10;
$count=mysqli_query($con,'SELECT count(*) FROM user');
$count=mysqli_fetch_array($count);
$count=$count[0];
$totalPage=floor(($count-1)/$pageCount+1);
if($_GET['nowPage']){
	if($_GET['nowPage']>$totalPage){
		$nowPage=$totalPage;
	}else if($_GET['nowPage']<1){
		$nowPage=1;
	}else{
		$nowPage=$_GET['nowPage'];
	}
}else{
	$nowPage=1;
}
$pageStart=($nowPage-1)*$pageCount;
$result=mysqli_query($con,'SELECT * FROM user LIMIT '.$pageStart.','.$pageCount);
$users=array();
foreach ($result as $row ) {
	array_push($users, $row);
}
header('Content-type:application/json');
echo json_encode(array('users'=>$users,'nowPage'=>$nowPage,'totalPage'=>$totalPage));
mysqli_close($con);


?>
