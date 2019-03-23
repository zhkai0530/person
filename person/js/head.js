window.onload = function(){
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

	//不同页面的导航显示不同样式
	(function(){
		var url = window.location.pathname.split('?')[0].split('/').pop(),
			links = document.querySelector('nav').getElementsByTagName('ul')[0].getElementsByTagName('a'),
			index = 0;
		if(url){
			for(var i = 0;i<url.length;i++){
				if(links[i].href.indexOf(url) !== -1){
					index = i;
					break;
				}
			}
		}
		links[index].style.color = "#aeaeae";
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