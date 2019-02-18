<!DOCTYPE html>
<html>
<head>
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
</head>
<body>
<?php include "Template/head.php" ?>
<form action="php/getValue.php" method="POST">
	<div class="formBox">
		<div class="registerBox">
			<div class="subInfoBox">
				<label>昵称：</label><input type="text" name="nickName" class="subInfo" placeholder="请输入您的昵称"><br />
				<label>姓名：</label><input type="text" name="personName" class="subInfo" placeholder="请输入您的姓名"><br />
				<label>邮箱：</label><input type="mail" name="email" class="subInfo" placeholder="请输入邮箱"><br />
				<label>电话：</label><input type="phone" name="phone" class="subInfo" placeholder=" 请输入您的电话"><br />
				<label>密码：</label><input type="password" name="pwd1" class="subInfo" placeholder="请输入您的密码"><br />
				<label>重复密码：</label><input type="password" name="pwd2" class="subInfo" placeholder="请确认密码"><br />
				<input type="submit" name="btn" class="btn">
				<input type="button" name="btn" class="btn" value="重置">
			</div>
		</div>
	</div>
	</form>
<?php include "Template/footer.php" ?>
</body>
</html>