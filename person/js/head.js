window.onload = function(){
	var navBar = document.getElementsByTagName("nav");
	var navLi = navBar[0].getElementsByTagName("li");
	var navLi_a = new Array();
	var urlPath = window.location.pathname;
	var arrUrl = urlPath.split("/");
	var pageName = arrUrl[arrUrl.length-1];
	for(var i = 0;i<navLi.length;i++){
		navLi_a[i] = navLi[i].getElementsByTagName("a");
		var aHref = navLi_a[i][0].href.split("/");
		if(aHref[aHref.length-1] == pageName){
			navLi_a[i][0].style.color = "#aeaeae";
		}
	}
}