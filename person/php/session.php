<?php 
	session_start();
	header("content-type:text/html;charset=utf8");
	$_SESSION['is_user_logged_in'] = false;
 ?>