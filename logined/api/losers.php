<?php
error_reporting(E_ALL || ~E_NOTICE);
$con=mysqli_connect("localhost","admin","admin","finding"); 
mysqli_set_charset($con, "utf8");
if (mysqli_connect_errno($con)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
}
$pageCount=6;
$count=mysqli_query($con,'SELECT count(*) FROM loser');
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
$result=mysqli_query($con,'SELECT * FROM loser order by id desc LIMIT '.$pageStart.','.$pageCount);
$losers=array();
foreach ($result as $row ) {
	array_push($losers, $row);
}
header('Content-type:application/json');
echo json_encode(array('losers'=>$losers,'nowPage'=>$nowPage,'totalPage'=>$totalPage));
mysqli_close($con);


?>
