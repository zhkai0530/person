<?php 
	header("content-type:text/html;charset=utf8");
	$username = "root";
	$serverPWD = "wangjing198310";
	$mysqlAdress = "localhost";
	$serverName = "person";
	$tableNaem = "personinfo";
	$conn = mysqli_connect($mysqlAdress,$username,$serverPWD,$serverName);
	mysqli_query($conn,"set names utf8");

 ?>