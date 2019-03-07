<?php
session_start();
header("content-type:text/html;charset=utf8");
if(isset($_SESSION['nickName'])){
	unset($_SESSION['nickName']);
	session_destroy();
	$_SESSION['is_user_logged_in'] = false;
	header('location:http://localhost/www/git-person/person/index.php');
}