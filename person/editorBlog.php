<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑</title>
	<?php require_once("Template/head.php") ?>
</head>
<body>
	<?php require_once("Template/header.php") ?>
	<div class="container">
		<form action="php/subBlog.php" method="post">
			<div class="eContentBox">
			<div class="impBox">
				<ul>
					<li class="title"><input type="text" name="title" placeholder="请输入标题"></li>
					<li class="time"><input type="text" name="date" placeholder="创建时间" value="12"></li>
				</ul>
			</div>
			<div class="stylesheet">
				<p class="strong click">B</p>
				<p class="italic">I</p>
				<p class="underline">U</p>
				<select>
					<option>6px</option>
					<option>7px</option>
					<option>8px</option>
					<option>10px</option>
					<option>12px</option>
					<option>14px</option>
					<option>16px</option>
					<option>18px</option>
					<option>20px</option>
					<option>22px</option>
					<option>24px</option>
				</select>
				<p class="left">左</p>
				<p class="middle">中</p>
				<p class="right">右</p>
			</div>
			<div class="blogContent">
				<textarea name="blogContent"></textarea>
			</div>
			<div class="editorBlogSub">
				<input type="submit" value="提交">
			</div>
		</div>
		</form>
	</div>
	<script type="text/javascript">
		var date = new Date();
		var dateInput = document.getElementsByName("date")[0];
		var creatDate = date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
		console.log(creatDate);
		dateInput.value = creatDate;
	</script>
	<?php require_once("Template/footer.php") ?>
</body>
</html>