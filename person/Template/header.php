	<div id="login" class="formCtr">	
		<form action="php/login.php" method="POST">
		<div class="formBox">
			<div class="registerBox">
			<div class="close">X</div>
				<div style="clear: both;"></div>
				<div class="subInfoBox">
					<label>账号：</label><input type="text" name="name" class="subInfo" placeholder="邮箱/电话"><br />
					<label>密码：</label><input type="password" name="pwd" class="subInfo" placeholder="请输入您的密码"><br />
					<input type="submit" name="btn" class="btn" value="登录">
				</div>
			</div>
		</div>
		</form>
	</div>
	<div id="reg" class="formCtr">
		<form action="php/register.php" method="POST">
			<div class="formBox">
				<div class="registerBox">
					<div class="close">X</div>
					<div style="clear: both;"></div>
					<div class="subInfoBox">
						<label>昵称：</label><input type="text" name="nickName" class="subInfo" placeholder="请输入您的昵称"><br />
						<label>姓名：</label><input type="text" name="personName" class="subInfo" placeholder="请输入您的姓名"><br />
						<label>生日：</label><input type="text" name="birthday" class="subInfo" placeholder="请输入您的生日"><br />
						<label>邮箱：</label><input type="mail" name="email" class="subInfo" placeholder="请输入邮箱"><br />
						<label>电话：</label><input type="phone" name="phone" class="subInfo" placeholder=" 请输入您的电话"><br />
						<label>密码：</label><input type="password" name="pwd1" class="subInfo" placeholder="请输入您的密码"><br />
						<label>重复密码：</label><input type="password" name="pwd2" class="subInfo" placeholder="请确认密码"><br />
						<input type="submit" name="btn" class="btn">
						<input type="button" name="btn" class="btn" value="重置">
					</div>
				</div>
			</div>
		</form>
	</div>
	<header>
		<div class="headTop head">
			<div class="logIn clearfix">
				<ul>
					<?php
					session_start();
					if(isset($_SESSION['is_user_logged_in'])){
						echo "<li><a>".$_SESSION['nickName']."</a></li>
						<li> | </li>
						<li><a href=\"php/cancell.php\">注销登录</a></li>
						<li class=\"headpro\"><a><img src=\"http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image\" alt=\"placeholder+image\" style=\"width:100%;height:100%;\"></a></li>";
					}else{
						echo "<li class=\"logInBTN formBTN\"><a>登录</a></li>
						<li> | </li>
						<li class=\"registerBTN formBTN\"><a>注册</a></li>";
					}
					$_SESSION['url'] = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					?>
				</ul>
			</div>
		</div>
	</header>
	<nav class="navBar">
		<div class="navTop head">
			<div class="nav clearfix">
				<div class="logo"><a href="index.php">KAI'S ROOM</a></div>
				<ul>
					<?php 	
						$url = explode('/',$_SERVER['REQUEST_URI']);
						for($index=0;$index<count($url);$index++){
							$url = $url[count($url)-1];
						}
						$url = explode("?",$url);
						if($url[0]==''){
							$url[0] = "index.php";
						}
					 ?>
					<li><a class="<?php echo $url[0]=='index.php'?'on':''; ?>" href="index.php">首页</a></li>
					<li><a class="<?php echo $url[0]=='blog.php'?'on':'';?>" href="blog.php">我的博客</a></li>
					<li><a class="<?php echo $url[0]=='personal_information.php'?'on':'';?>" <?php if(isset($_SESSION['is_user_logged_in'])){
						if($_SESSION['is_user_logged_in']){
							echo 'href="personal_information.php"';
						}
					}else{
						echo 'href="javascript:void(0);"';
						echo 'onclick="javascript:alert('.'\'您还没有登录，请登录。\''.');"';
					} ?> >个人信息</a></li>
					<?php 
						if(isset($_SESSION['is_user_logged_in'])){
							echo "<li><a href='editorBlog.php'>写博客</a></li>";
						}
					 ?>
				</ul>
			</div>
		</div>
	</nav>