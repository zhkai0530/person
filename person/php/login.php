<?php 
	header("content-type:text/html;charset=utf8");
	include "loginMysql.php";
	$username = $_POST["name"];
	$userpwd = $_POST["pwd"];
	$get_data = "select * from personinfo limit 1";
	$result = mysqli_query($conn,$get_data);
	session_start();
	while($row = mysqli_fetch_array($result)){
		if($row['phone'] === $username || $row['email'] === $username){
			if($row['password'] === $userpwd){
				$_SESSION['nickName'] = $row['nickName'];
				$_SESSION['is_user_logged_in'] = true;
				echo "<meta http-equiv=refresh content=0;url=\"../index.php\">";
			}else{
				echo '密码错误';
				$_SESSION['is_user_logged_in'] = false;
			}
		}else{
			echo "账号错误";
			$_SESSION['is_user_logged_in'] = false;
		}
	}
 ?>