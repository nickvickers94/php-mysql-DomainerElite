<?PHP session_start();
if(isset($_GET['p']) && isset($_GET['s'])){
setcookie("p",$_GET['p'],time()+72000,"/",'.onlinegoldmine.com',false);
setcookie("s",$_GET['s'],time()+72000,"/",'.onlinegoldmine.com',false);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Goldmine</title>
<script type="text/javascript" src="members/javascript/swfobject.js"></script>
<script type="text/javascript" src="members/javascript/jquery.js"></script>
<script type="text/javascript">
function per(num, percentage){
  return num*percentage/100;
}

var totalLength = "1.5";
seconds = per(totalLength, 30) * 60;
seconds = seconds * 1000;
function showVideo() {document.getElementById("link").style.visibility = "visible";}
setTimeout("showVideo()", seconds); // 1000 = 1 sec , 180000sec
</script>
<style type="text/css">
body{
background-color:#000000;
}
.field{
border:0px;
padding-left:5px;
padding-bottom:5px;
padding-top:5px;
padding-right:35px;
width:225px;
height:26px;
font-weight:bold;
}

#name{
background:url(http://www.onlinegoldmine.com/images/nameField.png);
}

#email{
background:url(http://www.onlinegoldmine.com/images/emailField.png);
}
</style>
</head>
<body>
<center><iframe width="847" height="608" src="https://www.youtube.com/embed/UOU2A5vQLAY" frameborder="0" allowfullscreen></iframe>
			</center>
</body>
</html>