<?php
error_reporting(E_ALL || ~E_NOTICE);
session_start();
if($_SESSION['admin_name']){
	header("Location: index.php");
}

if($_GET['action'] == "logout") {
  unset($_SESSION['admin_name']);
  //echo "注销登录成功！点击此处 <a href='login.php'>登录";
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/寻物.png">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/vue.min.js"></script>
	<title>管理员</title>
</head>
<body>
	<div class="container" style="width: 350px;margin-top: 180px;">
        <h2 class="form-signin-heading" style="font-size: 28px">校园寻物平台管理员登录</h2>
        <br>
        <input type="text" id="username" name="username" class="form-control" placeholder="用户名" required autofocus>
        <input type="password" id="password" name="password" class="form-control" placeholder="密码" required>
        <br>
        <button class="btn btn-lg btn-primary btn-block" onclick="submit()">Sign in</button>
    </div> <!-- /container -->

    <script type="text/javascript">
    	function submit() {
    		$.post('api/login.php',{'username':$("#username").val(),'password':$("#password").val()},function(data){
    			if(data.flag==1){
    				top.location="index.php";
    			}else{
    				alert('用户名或密码错误');
    			}
            },'json');
    	}
    </script>

</body>
</html>