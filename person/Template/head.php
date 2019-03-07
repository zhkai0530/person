<header>
		<div class="headTop head">
			<div class="logIn clearfix">
				<ul>
					<?php
					session_start();
					if(isset($_SESSION['is_user_logged_in'])){
						if($_SESSION['is_user_logged_in']){
							echo "<li><a href=\"login.php\">".$_SESSION['nickName']."</a></li>
							<li> | </li>
							<li><a href=\"php/cancell.php\">注销</a></li>
							<li class=\"headpro\"><a href=\"login.php\"></a></li>";
						}else{
							echo "<li><a href=\"login.php\">登录</a></li>
							<li> | </li>
							<li><a href=\"register.php\">注册</a></li>
							<li class=\"headpro\"><a href=\"login.php\"></a></li>";
						}
					}else{
						echo "<li><a href=\"login.php\">登录</a></li>
						<li> | </li>
						<li><a href=\"register.php\">注册</a></li>
						<li class=\"headpro\"><a href=\"login.php\"></a></li>";
					}
					
					?>
				</ul>
			</div>
		</div>
	</header>
	<nav class="navBar">
		<div class="navTop head">
			<div class="nav clearfix">
				<div class="logo"><a href="index.html">KAI'S ROOM</a></div>
				<ul>
					<li><a href="index.php">首页</a></li>
					<li><a href="blog.php">博客</a></li>
					<li><a href="msg.php">信息</a></li>
					<li><a href="#">预留</a></li>
				</ul>
			</div>
		</div>
	</nav>