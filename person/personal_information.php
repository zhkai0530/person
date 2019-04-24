<!DOCTYPE html>
<html lang="en">
<?php require_once("Template/head.php"); ?>
<body>
	<?php 
		require_once("Template/header.php"); 
		require_once("./php/config.php");
		$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("连接数据库异常");
		mysqli_query($conn,"set names utf8");
		if(!isset($_SESSION["is_user_logged_in"])){
			echo "<script>alert('您还没有登录，请登录。')</script>";
		}else{
			$sql = "select * from userinfo where ID ='" . $_SESSION['id'] . "'";
			$result = mysqli_query($conn,$sql);
			if(!$result){
				echo "<div class='empty'>空空如也</div>";
			}else{
				while ($row = mysqli_fetch_array($result)){
					function getAge($birth){
						//格式化用户时间
						$uyear = date('Y',$birth);
						$umonth = date('m',$birth);
						$uday = date('d',$birth);
						//获取当前时间
						$nyear = date('Y');
						$nmonth = date('m');
						$nday = date('d');
						//计算年龄
						$age = $nyear-$uyear;
						if($nmonth>$umonth||$nmonth == $umonth && $nday>$uday){
							$age--;
						}
						return $age;
					}
					$ubirth = strtotime($row['birthday']);
					$age = getAge($ubirth);

	?>
	<div class="container">
			<div class="contentBox">
				<div class="imgBox">
					<img src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
					<p><?php echo $row['nickname'] ?></p>
				</div>
				<div class="infoBox">
					<ul class="list-item">
						<li><span>姓名：</span><span><?php echo $row['name']; ?></span></li>
						<li><span>年龄：</span><span><?php echo $age; ?></span></li>
						<li><span>电话：</span><span><?php echo $row['phone']; ?></span></li>
						<li><span>邮箱：</span><span><?php echo $row['email']; ?></span></li>
						<li><span>出生日期：</span><span><?php echo $row['birthday']; ?></span></li>
						<?php 
							$data = "select * from detail_info where uid='".$row['ID']."'";
							$res = mysqli_query($conn,$data);
							while($dataiRow = mysqli_fetch_array($res)){
						 ?>
						<li>
							<span>地区：</span>
							<span>
								<?php 
									if($dataiRow['hometown']!=""){
										echo $dataiRow['hometown'];
									}else{
										echo '';
									} 
								?>
							</span>
						</li>
						<li>
							<span>行业：</span>
							<span>
								<?php 
									if($dataiRow['industry']!=""){
										echo $dataiRow['industry'];
									}else{
										echo '';
									} 
								?>	
							</span>
						</li>
						<li>
							<span>岗位：</span>
							<span>
								<?php 
									if($dataiRow['job']!=""){
										echo $dataiRow['job'];
									}else{
										echo '';
									} 
								?>	
							</span>
						</li>
						<li>
							<span>简介：</span>
							<span>
								<?php 
									if($dataiRow['introduction']!=""){
										echo $dataiRow['introduction'];
									}else{
										echo '';
									}}}}} 
								?>
							</span>
						</li>
					</ul>
				</div>
				<div class="changeInfo">
					<a href="" title="修改个人资料">修改资料</a>
					<a href="" title="完善个人资料">完善资料</a>
				</div>
			</div>
	</div>
	<?php 
		require_once('Template/footer.php'); 
	?>
</body>
</html>