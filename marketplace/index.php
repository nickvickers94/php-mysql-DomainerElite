<?php 
	if ($_GET['v']) {
		$video = $_GET['v'];
	} else {
		$video = 'm5SS6vDkHyA';
	}	
	$height = 540;
	$width = 960;
	$showButtonAtPercent = 50;
?>
<?php include '../members/membercontrol/settings.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Domainer Elite PRO</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<style>
html, body {
	margin: 0;
	padding: 0;
	background: #101010;
	font-family: 'Open Sans', sans serif;
	color: #000;
}
#wrapper {
	background: #fff;
	width: 1200px;
	margin: 20px auto 20px auto;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	border-radius: 10px;
	background-image: url(images/money.png);
}
#video {
	width: 980px;
	margin: 0 auto;
	padding: 10px;
	background: #101010;
	box-shadow: 0 0 3px rgba(255, 255, 255, 0.2), 0 0 5px rgba(255, 255, 255, 0.2);
}
#order {
	width: 980px;
	margin: 50px auto;
} 
#order a, #order input {
	height: auto;
	text-align: center;
	font-size: 32px;
	font-weight: bold;
}
#subscribed {
	width: 980px;
	margin: 50px auto;
	border: 5px dashed green;
	background: #fff;
	text-align: center;
	padding: 50px;
	font-size: 48px;
	font-weight: bold;
	color: green;
}
#headline {
	font-size: 48px;
	font-weight: bold;
	text-align: center;
	width: 100%;
	color: yellow;
	text-shadow: 2px 2px 4px #000;
	margin-bottom: 10px;
}
#nothanks {
	text-align: center;
	margin-top: 10px;
	padding-bottom: 50px;
}
a {
	color: gray;
}

</style>



<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1769584896634906'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1769584896634906&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->


</head>

<body>
<center><img src="images/domainer-elite2-small.png" /></center>
<div id="headline">
Domainer Elite Marketplace</div>
<div id="wrapper">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Domainer Elite Marketplace</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Buy Domains</a></li>
      <li><a href="http://www.domainerelite.com/pro/">Sell Domains</a></li>
      <li><a href="http://www.domainerelite.com/pro/">My Listings</a></li>
      <li><a href="http://www.domainerelite.com/pro/">My Profile</a></li>
    </ul>
  </div>
</nav>
<div id="listings">

<div class="panel-body table-responsive">
                  
              
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>Domain</th>
                          <th>Description</th>
                          <th style="white-space: nowrap">Date Listed</th>
                          <th>Likes</th>
                          <th>Type</th>
                          <th>Category</th>
                          <th>Price</th>
                          <th class="no-sort">&nbsp;</th>
                        </tr>
                      </thead>
                      
<?php $link = mysql_connect($dbhost,$dbuser,$dbpass);
				mysql_select_db($dbname);
				$query = "SELECT id, user_id, domain, listingdate, description, votes, type, price, link, category FROM marketplace_domains ORDER BY votes DESC";
				$result = mysql_query($query);
				?>
                      <tbody>
                      <?php while (list($id, $user_id, $domain, $listingdate, $description, $votes, $type, $price, $link, $category) = @mysql_fetch_array($result)): ?>
                      <? $query = "SELECT count(*) FROM marketplace_domains_likes WHERE domain_id='$id' AND user_id='{$_SESSION['id']}'";
                      	 $lresult = mysql_query($query);
                      	 list($count) = @mysql_fetch_array($lresult);
                      	 
                      ?>
                        <tr class="odd gradeX">
                          <td><?php echo $domain; ?></td>
                          <td><?php echo nl2br($description); ?></td>
                          <td><?php echo $listingdate; ?></td>
                          <td id="votes_<?php echo $id; ?>"><?php echo $votes; ?></td>
                          <td><?php echo $type; ?></td>
                          <td><?php echo $category; ?></td>
                          <td class="center"><?php echo money_format('%.2n',$price); ?></td>
                          <td class="center" style="white-space: nowrap"><a href="" class="btn btn-info btn-xs"><i class="fa fa-user"></i> View Seller</a> <a href="<?=$link?>" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-shopping-cart"></i> View Listing</a> <a href="" id="like_<?php echo $id; ?>" class="btn btn-primary btn-xs" <?php if ($count > 0): ?>disabled<?php endif ?>><i class="fa fa-thumbs-up"></i> Like</a></td>
                        </tr>
    <?php endwhile ?>
                      </tbody>
                    </table>
                  </div>

</div>


		</div>
<p class="text-center">Copyright <?php echo date('Y'); ?> - All Right Reserved | <a href="http://www.domainerelite.com/iterms.php">Terms &amp; Conditions</a> | <a href="http://www.domainerelite.com/iprivacy.php">Privacy Policy</a> | <a href="http://www.domainerelite.com/members/">Paid Members</a> | <a href="mailto:specialprojectwithjamie@gmail.com">Contact</a> | <a href="http://champsites.com">Support</a> | <a href="http://www.domainerelite.com/jv/">Affiliates</a></p>



<script>
   /*
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '<?php echo $height; ?>',
          width: '<?php echo $width; ?>',
          playerVars: { 'autoplay': 1, 'controls': 0, 'showinfo': 0, 'rel': 0 },
          videoId: '<?php echo $video; ?>',
          events: {
            'onStateChange': onPlayerStateChange
          }
        });
      }
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING) {
         	var duration = player.getDuration();
         	var percent = <?php echo $showButtonAtPercent / 100; ?>;
         	var timer = (duration * percent) * 1000;
         	setTimeout(function(){  document.getElementById("timed").style.visibility = "visible"; }, timer);
        }
      }
*/
</script>

<script>
$(document).ready(function(){
    $('#data-tables').DataTable();
});
</script>

<script language="javascript">

  var exitsplashmessage =  "WAIT! Don't Leave Yet!";

  var exitsplashpage = 'https://www.jvzoo.com/nothanks/254081';

</script>

<script language="javascript" src="/pro/exitsplashs.js"></script>	
</body>
</html>