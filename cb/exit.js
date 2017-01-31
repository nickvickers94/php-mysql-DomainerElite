function addLoadEvent(func) { 
	var oldonload = window.onload; 
	if (typeof window.onload != 'function') { 
		window.onload = func; 
	} else { 
		window.onload = function() { 
			if (oldonload) { oldonload(); 
		}  
		func(); 
		}
	}
}
function addClickEvent(a,i,func) { 
	if (typeof a[i].onclick != 'function') { 
		a[i].onclick = func; 
	} 
}
var PreventExitSplash = false;
function DisplayExitSplash(){ 
	if(PreventExitSplash == false) { 
		setTimeout(function() {
            window.onbeforeunload = function() {};
            setTimeout(function() {
                document.location.href = exitsplashpage;
            }, 500);
        },5);
        return exitsplashmessage;
	} 
}
var a = document.getElementsByTagName('A'); for (var i = 0; i < a.length; i++) { if(a[i].target !== '_blank') {addClickEvent(a,i, function(){ PreventExitSplash=true; });} else{addClickEvent(a,i, function(){ PreventExitSplash=false;});}}disablelinksfunc = function(){var a = document.getElementsByTagName('A'); for (var i = 0; i < a.length; i++) { if(a[i].target !== '_blank') {addClickEvent(a,i, function(){ PreventExitSplash=true; });} else{addClickEvent(a,i, function(){ PreventExitSplash=false;});}}
}
addLoadEvent(disablelinksfunc);
disableformsfunc = function(){ var f = document.getElementsByTagName('FORM'); for (var i=0;i<f.length;i++){ if (!f[i].onclick){ f[i].onclick=function(){ PreventExitSplash=true; } }else if (!f[i].onsubmit){ f[i].onsubmit=function(){ PreventExitSplash=true; }}}}
addLoadEvent(disableformsfunc);
window.onbeforeunload = DisplayExitSplash;