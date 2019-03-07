<?php 
session_start();
	class Login {
		public $user;
		public $pwd;
		function __construct(){
			require 'config.php';
			$this->user = $_POST["name"];
			$this->pwd = $_POST["pwd"];
		}

		function checkpwd (){
			if(!trim($this->pwd)==""){
				$strlen = strlen($this->pwd);
				if($strlen>20 || $strlen<6){
					echo "<script>alert('您的密码长度错误，请再试一次。');history.go(-1);</script>";
					exit();
				}else{
					$this->pwd = md5($this->pwd);
				}
			}
		}

		function checkuser (){
			$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("数据库连接失败");
			mysqli_query($conn,"set names utf8");
			$sql = "select * from personinfo where phone='".$this->user."' or email='".$this->user."'";
			$result = mysqli_query($conn,$sql);
			if(!$result)
			{
				echo "<script>alert('连接错误，请稍后尝试。')history.go(-1);</script>";
				exit();
			}else{
				if(mysqli_num_rows($result) <= 0){
					echo "<script>alert(\"用户名错误\");history.go(-1);</script>";
					exit();
				}else{
					while ($row = mysqli_fetch_array($result)) 
					{
						if($row['phone'] = $this->user or $row['email'] = $this->user)
						{
							if($row["password"] = $this->pwd)
							{
								// echo $row['name'];
								$_SESSION['is_user_logged_in'] = true;
								$_SESSION['nickName'] = $row['nickName'];
								echo "<script>location.href = 'http://localhost/www/git-person/person/index.php';</script>";
							}else{
								echo "<script>alert(\"密码错误\");location.href = 'http://localhost/www/git-person/person/index.php';</script>";
								exit();
							}
						}
					}
				}
			}
		}
		function doLogin(){
			$this->checkpwd();
			$this->checkuser();
		}
	}
	$login = new Login();
	$login->doLogin();
 ?>