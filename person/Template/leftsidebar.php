<div class="leftSideNav">
	<table border=0 cellspacing=0 cellpadding=0>
		<tr>
			<th>导航</th>
		</tr>
	<?php 
		require_once("./php/config.php");
		$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("连接数据库异常");
		mysqli_query($conn,"set names utf8");
		$sql = "select * from classify";
		$result = mysqli_query($conn,$sql);
		if(!$result){
			echo "空的";
		}else{
			while ($row = mysqli_fetch_array($result)){
	?>
		<tr>
			<td><a href="#"><?php echo $row['leftSideBar'] ?></a></td>
		</tr>
	<?php }} ?>
	</table>
</div>