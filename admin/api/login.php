<?php
if(!$_POST){
	header("Location: ../login.php");
}else{
	$db = mysqli_connect("localhost","admin","admin","finding") or die ('Unable to connect. Check your connection parameters.');
    mysqli_set_charset($db, "utf8");
    $sql="SELECT * FROM admin where username = '$_POST[username]' and password = '$_POST[password]'";
    $result=mysqli_query($db, $sql);
    $data=array();
	foreach ($result as $row ) {
		array_push($data, $row);
	}
    if($data){
    	session_start();
    	$_SESSION['admin_name']=$_POST['username'];
    	echo json_encode(array('flag'=>1));
    	exit();
    }else{
    	echo json_encode(array('flag'=>0));
    }
}



?>