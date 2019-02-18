<?php 
	header("content-type:text/html;charset=utf8");
	include "loginMysql.php";
	$nickName = $_POST["nickName"];
	$personName = $_POST["personName"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$pwd1 = $_POST["pwd1"];
	$pwd2 = $_POST["pwd2"];
	if($pwd1===$pwd2){
		$pwd = $pwd1;
		$sql = "insert into personinfo(nickName,name,phone,email,password) values('$nickName','$personName','$phone','$email','$pwd')";
		$result = mysqli_query($conn,$sql);
		if($result){
			echo "注册成功";
		}else{
			echo "注册失败:";
		}
	}else{
		echo "两次输入的密码不一致，请修改。";
	}
 ?>