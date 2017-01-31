<?
	include 'members/membercontrol/settings.php';
	$link = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname);
	
	list($firstname,$lastname) = preg_split('/\s+/', $_POST['ccustname']);
	$email = $_POST['ccustemail'];
	$type = $_POST['ctransaction'];
	$ccustname = mysql_real_escape_string($_POST['ccustname']);
	$cfirstname = mysql_real_escape_string($firstname);
	$clastname = mysql_real_escape_string($lastname);
	$ccuststate = mysql_real_escape_string($_POST['ccuststate']);
	$ccustcc = mysql_real_escape_string($_POST['ccustcc']);
	$ccustemail = mysql_real_escape_string($_POST['ccustemail']);
	$email = $_POST['ccustemail'];
	
	$cproditem = mysql_real_escape_string($_POST['cproditem']);
	$cprodtitle = mysql_real_escape_string($_POST['cprodtitle']);
	$cprodtype = mysql_real_escape_string($_POST['cprodtype']);
	$ctransaction = mysql_real_escape_string($_POST['ctransaction']);
	$ctransaffiliate = mysql_real_escape_string($_POST['ctransaffiliate']);
	$ctransamount = mysql_real_escape_string($_POST['ctransamount']);
	$ctranspaymentmethod = mysql_real_escape_string($_POST['ctranspaymentmethod']);
	$ctransvendor = mysql_real_escape_string($_POST['ctransvendor']);
	$ctransreceipt = mysql_real_escape_string($_POST['ctransreceipt']);
	$cupsellreceipt = mysql_real_escape_string($_POST['cupsellreceipt']);
	$caffitid = mysql_real_escape_string($_POST['caffitid']);
	$cvendthru = mysql_real_escape_string($_POST['cvendthru']);
	$cverify = mysql_real_escape_string($_POST['cverify']);
	$ctranstime = mysql_real_escape_string($_POST['ctranstime']);
	$password = "shoplicate";
	

	
	$query = "INSERT INTO jvzoo_transactions SET ccustname='$ccustname',
	                                             ccuststate='$ccuststate',
	                                             ccustcc='$ccustcc',
	                                             ccustemail='$ccustemail',
	                                             cproditem='$cproditem',
	                                             cprodtitle='$cprodtitle',
	                                             cprodtype='$cprodtype',
	                                             ctransaction='$ctransaction',
	                                             ctransaffiliate='$ctransaffiliate',
	                                             ctransamount='$ctransamount',
	                                             ctranspaymentmethod='$ctranspaymentmethod',
	                                             ctransvendor='$ctransvendor',
	                                             ctransreceipt='$ctransreceipt',
	                                             cupsellreceipt='$cupsellreceipt',
	                                             caffitid='$caffitid',
	                                             cvendthru='$cvendthru',
	                                             cverify='$cverify',
	                                             ctranstime='$ctranstime'";
	mysql_query($query);
	if ($type == 'SALE') {
		if ($cproditem == '197221') {
			$query = "INSERT INTO members SET email='$ccustemail'";
			mail_welcome($email);
		} 	
		if ($cproditem == '202319') {
			$query = "INSERT INTO members SET email='$ccustemail', software='Y'";
			mail_welcome($email);
		}
		if ($cproditem == '195449' || $cproditem == '199559') {
			$query = "UPDATE members SET software='Y' WHERE email='$ccustemail'";
		}
		if ($cproditem == '195453' || $cproditem == '199567') {
			$query = "UPDATE members SET webinars='Y' WHERE email='$ccustemail'";
		} 	
		if ($cproditem == '195455') {
			$query = "UPDATE members SET assistance='Y' WHERE email='$ccustemail'";
			mail_assistance_notification($email, $firstname, $lastname);
		}			
		mysql_query($query);
	}
	if ($type == 'RFND' || $type == 'CGBK' || $type == 'CANCEL-REBILL') {
		if ($cproditem == '197221') {
			$query = "UPDATE MEMBERS set active='N' WHERE email='$ccustemail'";
		}
		if ($cproditem == '195449' || $cproditem == '199559') {
			$query = "UPDATE MEMBERS set software='N' WHERE email='$ccustemail'";
		}
		if ($cproditem == '195453' || $cproditem == '199567') {
			$query = "UPDATE members SET webinars='N' WHERE email='$ccustemail'";
		} 	
		if ($cproditem == '195455') {
			$query = "UPDATE members SET assistance='N' WHERE email='$ccustemail'";
		}	
		mysql_query($query);
	}
	if ($type == 'UNCANCEL-REBILL') {
		$query = "UPDATE MEMBERS set active='Y' WHERE email='$ccustemail'";
		mysql_query($query);
	}
	
	function mail_welcome($email) {
$to = $email;

$subject = "Congrats, You're In The DomainerElite Training Program!";
$message = <<<EOF
Hey,

You've made one very smart move...

By securing your license to use and join my DomainerElite
online training program you're well on your way to discovering
EXACTLY what you need to do to generate incredible profits on
domain names.

To log into the members area and start
going through the program, please go here:

>> http://www.domainerelite.com/members/

username: $email

You're in for one incredible journey,
so buckle up, and enjoy the ride!

Talk soon,

Jamie
Your DomainerElite Coach

EOF;


$headers = 'From: Domainer Elite <noreply@domainerelite.com>' . "\r\n" .
    'Reply-To: Support <support@domainerelite.com>' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, stripslashes($message), $headers);
 
 }
 
 function mail_assistance_notification($email, $firstname, $lastname) {
$to = 'specialprojectwithjamie@gmail.com';

$subject = "Assistance (Flippa Listings)";
$message = <<<EOF
First Name: $firstname
Last Name: $lastname
Email: $email

EOF;


$headers = 'From: Domainer Elite <noreply@domainerelite.com>' . "\r\n" .
    'Reply-To: Support <support@domainerelite.com>' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, stripslashes($message), $headers);
 
 }
	               
?>                              
	
	
	
	