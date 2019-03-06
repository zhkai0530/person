<?php 
	class Login {
		public $user;
		public $pwd;
		public $is_user_logged_in = 0;
		function __construct(){
			require 'config.php';
			$this->user = $_POST["name"];
			$this->pwd = $_POST["pwd"];
		}

		function checkpwd (){
			if(!trim($this->pwd)==""){
				$strlen = strlen($this->pwd);
				if($strlen>20 || $strlen<6){
					echo "<script>alert('您的密码长度错误，请再试一次。')</script>";
					exit();
				}else{
					$this->pwd = md5($this->pwd);
				}
			}
		}

		function checkuser (){
			$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("数据库连接失败");
			mysqli_query($conn,"set names utf8");
			$sql = "select * from personinfo where name='".$this->user."' and password='".$this->pwd."'";
			$result = mysqli_fetch_row($conn->query($sql))[0];	
			if(!$result){
				echo "<script>alert('Email or password is incorrect.please try again!');history.go(-1);</script>";
			exit();
			}else{
				$conn->close();
				$_SESSION['user'] = $result;
				echo "<script>alert('登录成功!');location.href = 'http://127.0.0.1/tc/index.php'</script>";
				exit();
			}
			// while($row = mysqli_fetch_array($result)){
				// if($row['pwd']===$this->pwd && $row['name'] === $this->user){
				// 	echo "登录成功";
				// }else{
				// 	echo "用户名或密码错误";
				// }
			// }		
		}

		function doLogin(){
			$this->checkpwd();
			$this->checkuser();
		}
	}
	$login = new Login();
	$login->doLogin();
 ?>