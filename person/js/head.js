window.onload = function(){
	//根据窗口大小改变根字体大小，实现响应式
	(function(){
		var defaultScreenWidth = 1920;	
		function setFontSize(){
			var nowScreenWidth = window.document.documentElement.getBoundingClientRect().width;
			if(nowScreenWidth<=defaultScreenWidth){
				var baseSize = nowScreenWidth / defaultScreenWidth;
				// return baseSize;
				if(nowScreenWidth<=980){
					window.document.documentElement.style.fontSize = 18 + "px";
					var doc = document.getElementsByClassName("subInfoBox")[0];
					var lable = document.getElementsByTagName("label");
					for(var i = 0;i < lable.length;i++){
						console.log(lable[i])
						lable[i].remove();
					}
				}else{
					window.document.documentElement.style.fontSize = (20 * baseSize) + "px";
				}
			}
		}
		setFontSize();
		window.onresize = function(){
			setFontSize();
		}
	})();

	//监听页面滚动，导航栏置顶
	(function(){
		var navBar = document.getElementsByClassName("navBar");
		window.onscroll = function(){
			var scroll_top = document.documentElement.scrollTop || document.body.scrollTop;
			if(scroll_top>=40){
				navBar[0].style.cssText = "position:fixed;top:0px;z-index:9";
			}else{
				navBar[0].style.cssText = "position:normal";
			}
		}
	})();

	//显示/隐藏登录和注册页面
	(function(){
		var	close = document.getElementsByClassName('close'),
			formData = document.getElementsByClassName('formCtr'),
			formBTN = document.getElementsByClassName('formBTN');
			for(var i = 0;i<formBTN.length;i++){
				(function(i){
					formBTN[i].onclick = function(){
						formData[i].style.display = "block";
						formData[i].classList.add("movedown");
					}
				})(i)
			}
			for(var j = 0;j<close.length;j++){
				(function(j){
					close[j].onclick = function(){
						formData[j].classList.remove("movedown");
						formData[j].classList.add("moveup");
						var time = setTimeout(function(){
							formData[j].classList.remove("moveup");
							formData[j].style.display = "none";
						}, 500);
					}
				})(j)
			}
	})()
}