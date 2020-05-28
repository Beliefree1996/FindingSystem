<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>注册</title>

<link rel="stylesheet" href="css/style.css">

<body>

<div class="register-container">
	<h1 style="font-size: 45px;">Losed & Find</h1>

	<div class="connect">
		<p>Good Luck to You !</p>
	</div>
	
	<form action="registercheck.php" method="post" id="registerForm">
		<div>
			<input type="text" name="username" class="username" placeholder="您的用户名" autocomplete="off" />
		</div>
		<div>
			<input type="password" name="password" class="password" placeholder="输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div>
			<input type="password" name="confirm" class="confirm" placeholder="再次输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div>
		
		<input type="text" name='authcode' style="width:90px;" class="authcode" placeholder="请输入验证码" autocomplete="off"/>
		&emsp;<img id="captcha_img" border='1' src='./captchacheck.php?r=echo rand(); ?>' style="width:98px; height:36px" />
    	<a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='./captchacheck.php?r='+Math.random()">换一个?</a>
  		</div>
  		

 		<button id="submit" type="submit" name="submit">注 册</button>
	</form>

	<a href="login.php">
		<button type="button" class="register-tis">已经有账号？</button>
	</a>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/common.js"></script>
<!--背景图片自动更换-->
<script src="js/supersized.3.2.7.min.js"></script>
<script src="js/supersized-init.js"></script>
<!--表单验证-->
<script src="js/jquery.validate.min.js?var1.14.0"></script>
</body>
</html>