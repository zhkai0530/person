<?php 
	session_start();
	header("content-type:text/html;charset=utf8");
/*
	*注册后将用户名和密码使用session 传至login.php，实现自动登录。finished
	*获取用户填写的手机号和邮箱与数据库中进行比对，确认数据库中没有同样的信息，否则alert已经注册过。finished
	*大改传值方式，使用个AJAX传值。
	*将以上信息使用class包裹起来。finished
	*对客户密码进行加密，保存至数据库。已完成
	 */
 	class register {
 		public $nickName;
 		public $personName;
 		public $birthday;
 		public $email;
 		public $phone;
 		public $pwd;
 		public $pwd1;
 		public $pwd2;
 		public $url;

 		function __construct(){
 			require "config.php";
 			$this->nickName = $_POST["nickName"];
 			$this->personName = $_POST["personName"];
 			$this->birthday = $_POST["birthday"];
 			$this->email = $_POST["email"];
 			$this->phone = $_POST["phone"];
 			$this->pwd1 = $_POST["pwd1"];
 			$this->pwd2 = $_POST["pwd2"];
 		}

 		//检查昵称和姓名是否为空
 		function is_null(){
 			//检查用户名
 			if(trim($this->nickName)==""){
 				echo "<script>alert(\"昵称不能为空！\");history.go(-1);</script>";
 				exit();
 			}else if(trim($this->personName)==""){
 				echo "<script>alert(\"姓名不能为空！\");history.go(-1);</script>";
 				exit();
 			}
 		}

 		//检查生日格式
 		public function checkBirthday(){
 			if(!trim($this->birthday) == ""){
 				$preg = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}/ims';
 				if(!preg_match($preg,$this->birthday)){
 					echo "<script>alert(\"出生日期格式不正确，请重新输入！\");history.go(-1);</script>";
 					exit();
 				}
 			}
 		}

 		//检查邮箱
 		public function checkEmail(){
 			if(!trim($this->email)==""){
 				$preg = '/^[a-zA-Z0-9]+([-_.][a-zA-Z0-9]+)*@([a-zA-Z0-9]+[-.])+([a-z]{2,5})$/ims';
 				if(!preg_match($preg,$this->email)){
 					echo "<script>alert(\"邮箱格式不正确，请重新输入！\");history.go(-1);</script>";
 					exit();
 				}else{
 					$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("数据库连接异常");
 					mysqli_query($conn,"set names utf8");
 					$sql = "select * from userinfo where email='".$this->email."'";
 					$result = mysqli_query($conn,$sql);
 					if(mysqli_num_rows($result)>0){
 						echo "<script>alert(\"邮箱已被注册，请更换其他邮箱！\");history.go(-1);</script>";
 						exit();
 					}
 				}
 			}else{
 				echo "<script>alert(\"邮箱不能为空！\");history.go(-1);</script>";
 				exit();
 			}
 		}

 		//检查手机号码
 		public function checkPhone(){
 			if(!trim($this->phone)==""){
 				$preg = '/^[1][345789][0-9]{9}$/ims';
 				if(!preg_match($preg,$this->phone)){
 					echo "<script>alert(\"手机号格式不正确，请确认后再次尝试！\");history.go(-1);</script>";
 					exit();
 				}else{
 					$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("数据库连接异常");
 					mysqli_query($conn,"set names utf8");
 					$sql = "select * from userinfo where phone='".$this->phone."'";
 					$result = mysqli_query($conn,$sql);
 					if(mysqli_num_rows($result)>0){
 						echo "<script>alert(\"手机号已被注册，请直接登录！\");history.go(-1);</script>";
 						exit();
 					}
 				}
 			}
 		}

 		//检查密码是否相同
 		public function checkPWD(){
 			//判断密码是否为空
 			if(!trim($this->pwd1) == ""){
 				//获取密码长度
 				$strlen_first = strlen($this->pwd1);
 				$strlen_second = strlen($this->pwd2);
 				//判断密码长度是否合规，密码不能低于8位，不能高于20位
 				if(($strlen_first > 20 && $strlen_second > 20) || ($strlen_first < 8 && $strlen_second < 8)){
 					echo "<script>alert(\"您输入的密码长度不正确，请重新输入！\");history.go(-1);</script>";
 					exit();
 				}
 				//判断两次密码是否一致
 				if($this->pwd1 == $this->pwd2){
 					$this->pwd = md5($this->pwd1);
 				}else{
 					echo "<script>alert(\"您两次输入的密码不一致，请确认后重新输入！\");history.go(-1)</script>";
 					exit();
 				}
 			}else{
 				echo "<script>alert(\"密码不能为空！\");history.go(-1)</script>";
 				exit();
 			}
 		}

 		//将客户信息注入数据库
 		public function inject_info_in_sql(){
 			$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("数据路连接异常。");
 			mysqli_query($conn,"set names utf8");
 			$sql = "insert into userinfo(nickname,name,birthday,phone,email,password) values('".$this->nickName."','".$this->personName."','".$this->birthday."','".$this->phone."','".$this->email."','".$this->pwd."')";
 			echo $sql;
 			$result = mysqli_query($conn,$sql);
 			if($result){
 				echo "注册成功";
 			}else{
 				echo "注册失败";
 			}
 		}
 		
 		//数据注入完成，登录页面
 		public function login(){
 			$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("数据路连接异常。");
 			mysqli_query($conn,"set names utf8");
 			$sql = "select * from userinfo where phone='".$this->phone."'";
 			$result = mysqli_query($conn,$sql);
 			while ($row = mysqli_fetch_array($result)) 
			{
				$_SESSION['nickName'] = $row['nickname'];
				$_SESSION['is_user_logged_in'] = true;
				$_SESSION['id'] = $row['ID'];
				$_SESSION['name'] = $row['name'];
			}
 		}

 		public function doRegister(){
 			$this->is_null();
 			$this->checkBirthday();
 			$this->checkEmail();
 			$this->checkPhone();
 			$this->checkPWD();
 			$this->inject_info_in_sql();
 			$this->login();
 		}
 	}
 	$register = new Register();
 	$register->doRegister();
 	header("location:http://".$_SESSION['url']);
 ?>
