<div class="contents">	
	<?php 
		require_once("./php/config.php");
		$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("连接数据库异常");
		mysqli_query($conn,"set names utf8");
		if(isset($_SESSION["is_user_logged_in"])){
				$sql = "select * from article where uid ='" . $_SESSION['id'] . "'";
			}else{
				$sql = "select * from article";
			}
			$result = mysqli_query($conn,$sql);
			if(!$result){
				echo "空的";
			}else{
				while ($row = mysqli_fetch_array($result)){
	?>
		<div class="blogContent">
			<aside>
				<a href="article.php?id=<?php echo $row['ID']; ?>">
					<h3 class="title"><?php echo $row['title']; ?></h3>
					<p class="zuozhe">--本文来自： <?php echo $row['auther']; ?> 创建于: <span><?php echo $row["create_date"] ?></span></p>
					<p class="content"><?php echo $row['content']; ?></p>
					<p class="info">
						<span class="reade">5次阅读</span><span class="great">5次点赞</span>
					</p>
				</a>
			</aside>
		</div>
	<?php }}
		$sql1 = "select count(*) from article";
		$result1 = mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_array($result1);
		if($row1[0]%6){
			$a = intval($row1[0]/6) + 1;
		}else{
			$a = $row1[0]/6;
		}
	 ?>
		<div class="page_num_box">
			<ul>
				<li><input type="button" class="page_num" name="page_num" value="首页"></li>
				<?php for($i=1;$i<=$a;$i++){?>
				<li><input type="button" class="page_num" name="page_num" value="<?php echo $i; ?>"></li>
				<?php } ?>
				<li><input type="button" class="page_num" name="page_num" value="尾页"></li>
			</ul>
		</div>
</div>