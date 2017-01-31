<?php
$link = mysql_connect('localhost', 'domainer_elite', 'Jonopo123!');
mysql_select_db('domainer_elite');
date_default_timezone_set('America/New_York');
$ch = curl_init("https://api.citrixonline.com/oauth/access_token?grant_type=password&user_id=producerjamie@gmail.com&password=Jolabombo123!&client_id=bUr2hyvA1OIQ1UO3UQj4a6pAgLoEptTQ");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER,array ("Accept: application/json"));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = json_decode(curl_exec($ch));
echo "<pre>";
print_r($data);
echo "</pre>";
curl_close($ch);
$ch = curl_init("https://api.citrixonline.com/G2W/rest/organizers/" . $data->organizer_key . "/upcomingWebinars");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER,array ("Accept: application/json", "Authorization: OAuth oauth_token=" . $data->access_token, "Conent-type:application/json"));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$webinars = json_decode(curl_exec($ch));
echo "<pre>";
print_r($webinars);
echo "</pre>";
//$query = "DELETE FROM upcomingWebinars";
//mysql_query($query);
foreach ($webinars as $webinar) {
	$time = date("Y-m-d H:i:s", strtotime($webinar->times[0]->startTime));
	$webinarKey = $webinar->webinarKey;
	$subject = mysql_real_escape_string($webinar->subject);
	$description = mysql_real_escape_string($webinar->description);
	$timeZone = mysql_real_escape_string($webinar->timeZone);
	$registrationUrl = $webinar->registrationUrl;
	$query = "INSERT INTO upcomingWebinars SET webinarKey='$webinarKey', subject='$subject', description='$description', startTime='$time', timeZone='$timeZone', url='$registrationUrl'";
	echo $query . "<br />";
	mysql_query($query);
}
?>
