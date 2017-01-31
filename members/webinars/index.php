<?php
$link = mysql_connect('localhost', 'domainer_elite', 'Jonopo123!');
mysql_select_db('domainer_elite');
date_default_timezone_set('America/New_York');
$now = time();
$query = "SELECT webinarKey, subject, description, startTime, timeZone, url FROM upcomingWebinars WHERE UNIX_TIMESTAMP(startTime) > $now ORDER BY startTime";
$result = mysql_query($query);
while(list($webinarKey, $subject, $description, $startTime, $timeZone, $url) = mysql_fetch_array($result)): ?>
<center>
<p><?php echo date("D, M jS g:i A T", strtotime($startTime . $timeZone)); ?> <a href="<?php echo $url; ?>">click here to register</a></p>
<?php endwhile ?>
</center>

