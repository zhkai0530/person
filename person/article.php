<?php 
	session_start();
	require_once("php/config.php");
	$query_str = $_SERVER['QUERY_STRING'];
	parse_str($query_str);
	$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME) OR die("数据路连接异常。");
	mysqli_query($conn,"set names utf8");
	$sql = "select * from article where id = '".$id."'";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)){
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>技术论坛 -- <?php echo $row['title']; ?></title>
</head>
<body>
	<div>
		<h2><?php echo $row['title']; ?></h2>
		<div>
			<span>本文作者： <?php echo $row['auther']; ?></span>&nbsp;&nbsp;&nbsp;
			<span>本文创建于： <?php echo $row['create_date']; ?></span>
		</div>
		<div>
			<p>
				<?php echo $row['content']; ?>
			</p>
		</div>
	</div>
</body>
<?php } ?>
</html>