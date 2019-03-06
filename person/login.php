<!DOCTYPE html>
<html>
<head>
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
</head>
<body>
<?php include "Template/head.php" ?>
<form action="php/login.php" method="POST">
	<div class="formBox">
		<div class="registerBox">
			<div class="subInfoBox">
				<label>账号：</label><input type="text" name="name" class="subInfo" placeholder="邮箱/电话"><br />
				<label>密码：</label><input type="password" name="pwd" class="subInfo" placeholder="请输入您的密码"><br />
				<input type="submit" name="btn" class="btn">
			</div>
		</div>
	</div>
	</form>
<?php include "Template/footer.php" ?>
</body>
</html>