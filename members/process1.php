<?php 
//phpinfo();
require_once("includes/conn.php");
require_once("includes/simple_html_dom.php");
$row = "";
$result = $conn->query("SELECT * FROM domains LIMIT 1");
if($result->num_rows>0){
	$row = $result->fetch_array(MYSQLI_BOTH);		
}

/*$start_keywords = explode(",",$row["start_keywords"]);
$end_keywords = explode(",",$row["end_keywords"]);
$domain_keywords = explode(",",$row["domains_keywords"]);*/


error_reporting(0);
function getHTML($url,$timeout)
{
       $ch = curl_init($url); // initialize curl with given url
       curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
	   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to execute
       curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
	   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Authorization: sso-key VVJ12ciu_RtDTwFPoN2HMbNVQtZhhVv:RtDXaoyx9awGe1W7kcZT2U'
		));
       $data1 = curl_exec($ch);
	   
	   return $data1; 
}

function appraise($domain){
	
	$login_url = 'http://www.estibot.com/account.php';
		$cookie_file = "cookie.txt";
		if (! file_exists($cookie_file) || ! is_writable($cookie_file)){
			echo 'Cookie file missing or not writable.';
			exit;
		} 
		//These are the post data username and password
		$post_data = 'email=producerjamie@gmail.com&password=Jolabombo123!&Submit=Login&a=login';
		 

		 $ch = curl_init($login_url);
		//Set the useragent
		$agent = $_SERVER["HTTP_USER_AGENT"];
		
		curl_setopt($ch, CURLOPT_USERAGENT, $agent);
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		 
		//This is a POST query
		curl_setopt($ch, CURLOPT_POST, 1 );
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20000);
		 
		//Set the post data
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		 
		//We want the content after the query
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 
		//Follow Location redirects
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		 
		/*
		Set the cookie storing files
		Cookie files are necessary since we are logging and session data needs to be saved
		*/
		
		curl_setopt($ch, CURLOPT_COOKIEJAR, realpath($cookie_file));
		curl_setopt($ch, CURLOPT_COOKIEFILE, realpath('cookie.txt'));
		 
		//Execute the action to login
		$data2 = curl_exec($ch);
		file_put_contents('estibotlogin.txt', $data2);
		
		
		
		//$data_string = "&data=".$domain."&a=appraise&format=html&type=normal";
		$url1 = "http://www.estibot.com/appraise.php?a=appraise&data=".$domain."";
		curl_setopt($ch, CURLOPT_POST, 0 );
		curl_setopt($ch, CURLOPT_URL, $url1 );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		
		$data3 = curl_exec($ch);
		file_put_contents('estibotlog.txt', $data3);
		
		//echo $data3;
		$html1 = str_get_html($data3);
		
		$elem = $html1->find('td[id=td_value] strong', 0);
			
		//echo $elem;
		$val = preg_replace("/[^0-9]/","",$elem);
		/*if($val=='' || $val==NULL){
			$val = '0';	
		}*/
	//	$arr["ExactMatchDomain"]["Appraisals"] = $val;
	
		echo "$".$val;

		curl_close($ch);
			
}
if(isset($_POST["appraise"])){
	appraise($_POST["domain"]);	
}

$extention = "";

$keyword = $_POST["domain"];
$extention = $_POST["extention"];
$option = $_POST["option"];
$new_domains=$_POST['new_domains'];
$not_available = 0;

if($option==1 || $option==2 || $option==3){
	//to get selected extentions ie.Defualt is .com*/
	$domain = $keyword.".".$extention;
	$domain = str_replace(' ', '', $domain);
	//$data = getHTML("https://api.ote-godaddy.com/api/v1/domains/available?domain=".$keyword.".".$extention."&key=dpp_search&pc=&ptl=",600000);
	$data = getHTML("https://api.ote-godaddy.com/api/v1/domains/available?domain=".$domain,600000);
	// echo($domain);
	// echo("<br>");
	// echo("https://api.ote-godaddy.com/api/v1/domains/available?domain=".$domain);
	// echo("<br>");
	// echo($data);
	// echo("<br>");
	// exit(1);

	$data_decoded = json_decode($data, true);
	
	if($data_decoded=="" || $data_decoded===NULL){
		echo $data;
		echo "Please try again...";	
	}else{
		
		//$domain_found = $data_decoded["ExactMatchDomain"];
		//$available = $domain_found["AvailabilityStatus"];
		//$value = $domain_found["Appraisals"];
		//$available = $domain_found["AvailabilityStatus"];
		$available = $data_decoded["available"];
		if($available==true){
			echo '<li>'.$domain.'<button class="myButton">Register</button><button class="myButton">Appraise</button><button class="myButton">Save</button><button class="myButton">Sell</button></li>';
		}else{
			echo '<li>'.$domain.' is not available</li>';	
		}
		
	}
	
}else if($option==6 || $option==5 || $option==4){
	//to get selected extentions ie.Defualt is .com*/
	$domain = trim($keyword);
	$domain = str_replace(' ', '', $domain);
	
	$data = getHTML("https://api.ote-godaddy.com/api/v1/domains/available?query".$domain."&key=dpp_search&pc=&ptl=",600000);
	
	$data_decoded = json_decode($data, true);
	
	if($data_decoded=="" || $data_decoded===NULL){
		echo "Please try again...";	
	}else{
		
		$domain_found = $data_decoded["ExactMatchDomain"];
		$available = $domain_found["AvailabilityStatus"];
		$purchaseable = $domain_found['IsPurchasable'];
		$value = $domain_found["Appraisals"];
		
		if($available==1000 || $purchaseable=='true'){
			echo $domain." is available. <br />&nbsp;&nbsp;&nbsp;<a href='https://godaddy.com/domains/searchresults.aspx?ci=83269&checkAvail=1&domainToCheck=" .$domain. "' target='_blank' style='color:blue;'>Register</a> <a href='".$domain."' style='color:blue;' class='appraise'>Appraise</a>"."<br>";
		}else{
			echo "<span style='color:red;'>" . $domain . " is not available</span>";	
		}
		
	}
	
}




?>