window.onload = function(){
	var navBar = document.getElementsByTagName("nav");
	var navLi = navBar[0].getElementsByTagName("li");
	var navLi_a = new Array();
	var urlPath = window.location.pathname;
	var arrUrl = urlPath.split("/");
	var pageName = arrUrl[arrUrl.length-1];
	var reg = document.getElementById("reg");
	var logIn = document.getElementById("login");
	var logInBTN = document.getElementsByClassName("logInBTN")[0];
	var registerBTN = document.getElementsByClassName("registerBTN")[0];
	var close = document.getElementsByClassName("close");
	for(var i = 0;i<navLi.length;i++){
		navLi_a[i] = navLi[i].getElementsByTagName("a");
		var aHref = navLi_a[i][0].href.split("/");
		if(aHref[aHref.length-1] == pageName){
			navLi_a[i][0].style.color = "#aeaeae";
		}
	}

	//监听页面滚动，导航栏置顶
	var navBar = document.getElementsByClassName("navBar");
	window.onscroll = function(){
		var scroll_top = document.documentElement.scrollTop || document.body.scrollTop;
		if(scroll_top>=40){
			navBar[0].style.cssText = "position:fixed;top:0px;z-index:9";
		}else{
			navBar[0].style.cssText = "position:normal";
		}
	}
	var e = window || window.lib;
	var r = e.document;
	var a = r.documentElement;
	console.log(a)
}