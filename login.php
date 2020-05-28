<!DOCTYPE html>
<html lang="zh-CN">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>首页</title>
<link rel="shortcut icon" href="images/寻物.png">
<link rel="stylesheet" href="css/style.css">

<body>

<div class="login-container">
	<h1 style="font-size: 45px;">校 园 寻 物 平 台</h1>

	<div class="connect">
		<p>Welcome !</p>
	</div>
	
	<form action="logincheck.php" method="post" id="loginForm">
		<div>
			<input type="text" name="username" class="username" placeholder="用户名" autocomplete="off"/>
		</div>
		<div>
			<input type="password" name="password" class="password" placeholder="密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<button id="submit" type="submit" name="submit">登 录</button>
	</form>

	<a href="register.php">
		<button type="button" class="register-tis">还有没有账号？</button>
	</a>

	<br/> <br/>
	<div>
	<a href="unlogin/unlogin_index.php">我就看看，不发布</a>
	</div>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/common.js"></script>
<!--背景图片自动更换-->
<script src="js/supersized.3.2.7.min.js"></script>
<script src="js/supersized-init.js"></script>
<!--表单验证-->
<script src="js/jquery.validate.min.js?var1.14.0"></script>

<br/> <br/>
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p>适用浏览器：FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗. 不支持IE8及以下浏览器。</p>
<p>Copyright &copy; Beliefree <a target="_blank" href="https://github.com/Beliefree/SHU_Finding">Github</a></p>
</div>
</body>
</html>