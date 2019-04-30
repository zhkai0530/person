<?php 
	session_start();
	header("content-type:text/html;charset=utf8");
	//访问数据库
	
	class db {

		public $host = "127.0.0.1";
		public $uname = "root";
		public $password = "wangjing198310";
		public $dbName = "person";

		public function dbconn($sql)
		{
			$conn = new mysqli($this->host,$this->uname,$this->password,$this->dbName) or die("数据库连接异常");
			mysqli_query($conn,"set names utf8");
			$r = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($r);
			return $row;
		}
	}
 ?>