<?php 

	require_once("includes/conn.php");
	require_once("includes/simple_html_dom.php");

	$result = $conn->query("SELECT * FROM domains LIMIT 1");
	if($result->num_rows > 0){
		$row = $result->fetch_array(MYSQLI_BOTH);		
	}

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
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: sso-key VVJ12ciu_RtDTwFPoN2HMbNVQtZhhVv:RtDXaoyx9awGe1W7kcZT2U'));
		$data1 = curl_exec($ch);

		return $data1; 
	}

	function appraise($domain)
	{
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

		$val = preg_replace("/[^0-9]/","",$elem);

		echo "$".$val;

		curl_close($ch);
	}

	if(isset($_POST["appraise"])){
		appraise($_POST["domain"]);	
	}

	$option = $_POST["option"];

	if ( $option==1 || $option==2 || $option==3 ) {

		$keyword = $_POST["domain"];
		$extention = $_POST["extention"];
		
		//to get selected extentions ie.Defualt is .com*/
		$domain = $keyword.".".$extention;
		$domain = str_replace(' ', '', $domain);

		$data = getHTML("https://api.ote-godaddy.com/api/v1/domains/available?domain=".$domain,600000);

		$data_decoded = json_decode($data, true);
		
		if($data_decoded !="" && $data_decoded != NULL) {
			$available = $data_decoded["available"];
			if($available==true){
				echo '<li>'.$domain.'<a class="myButton" href="https://godaddy.com/domains/searchresults.aspx?ci=83269&checkAvail=1&domainToCheck='.$domain.'" target="_blank">Register</a><a href = "'.$domain.'" class="myButton appraise">Appraise</a><a href = "'.$domain.'" class="myButton save">Save</a><a href = "http://domainerelite.com/members/marketplace.php" target="_blank" class="myButton">Sell</button></li>';
			}
		}
	}
	elseif ( $option == 4 ) {
		$sql = "SELECT domain FROM expired_domains";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo("<li>".$row["domain"]."</li>");
			}
		}
		else {
			echo "0 results";
		}
	}
	elseif ( $option == 5 ) {
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
	elseif ( $option == 6 ) {

		$member_id = $_POST['member_id'];

		$sql = "SELECT domain FROM member_domains WHERE member_id ='".$member_id."'";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo("<li>".$row["domain"]."</li>");
			}
		}
		else {
			echo "0 results";
		}
	}
?>