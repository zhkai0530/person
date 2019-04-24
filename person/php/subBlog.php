<?php 
	/**
	 * 
	 */
	session_start();
	class subBlog {
		public $title;
		public $date;
		public $blogContent;

		function __construct(){
			require_once("config.php");
			$this->title = $_POST["title"];
			$this->date = $_POST["date"];
			$this->blogContent = $_POST["blogContent"];
		}

		//检测文章内是否有与数据库冲突的字符
		//检测替换文中的换行与空格
		function checkStr(){
			//检测标题内容
			if(strpos($this->title,"'")){
				$this->title = str_replace("'", "''", $this->title);
			}
			if(strpos($this->blogContent,"'")){
				$this->blogContent = str_replace("'", "''", $this->blogContent);
			}
			if(strpos($this->blogContent,"\r")){
				$this->blogContent = str_replace("\r","<br/>",$this->blogContent);
			}
			if(strpos($this->blogContent,"\n")){
				$this->blogContent = str_replace(" ","&nbsp",$this->blogContent);
			}
			echo $this->blogContent;
		}

		//向数据库注入数据
		function subBlogInfo(){
			$conn = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME) or die("数据库连接异常");
			mysqli_query($conn,"set names utf8");
			$sql = "insert into article(uid,title,create_date,auther,content) values('".$_SESSION['id']."','".$this->title."','".$this->date."','".$_SESSION['name']."','".$this->blogContent."')";
			mysqli_query($conn,$sql);
		}

		function doSub(){
			$this->checkStr();
			$this->subBlogInfo();
		}
	}
	$subBlog = new SubBlog();
	$subBlog->doSub();
	// header("location:http://localhost/www/git-person/person/blog.php");
 ?>