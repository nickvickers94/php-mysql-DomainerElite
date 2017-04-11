<?php 
	if ($_POST) {
		include 'settings.php'; 
		$link = mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db($dbname);
		$email = $_POST['email'];
		if ($email) {
			$memail = mysql_real_escape_string(trim($email));
			$query = "SELECT count(*) as count FROM members WHERE email='$memail'";
			$result = mysql_query($query);
			list($count) = mysql_fetch_array($result);
			if ($count > 0) {
				$sql = "UPDATE `domainer_elite`.`members` SET `software`='{$_POST['software']}', `software_pro`='{$_POST['software_pro']}', `webinars`='{$_POST['webinars']}', `assistance`='{$_POST['assistance']}', `marketplace`='{$_POST['marketplace']}', `marketplace_unlimited`='{$_POST['marketplace_unlimited']}', `ultimate_download`='{$_POST['ultimate_download']}', `special_project`='{$_POST['special_project']}', `active`='{$_POST['active']}', `firstname`='{$_POST['firstname']}', `lastname`='{$_POST['lastname']}', `about`='{$_POST['about']}', `contactemail`='{$_POST['contactemail']}', `website`='{$_POST['website']}', `facebook`='{$_POST['facebook']}', `twitter`='{$_POST['twitter']}', `free_webinar_start_time`='0000-00-00 00:00:00', `free_webinar_url`='{$_POST['free_webinar_url']}' WHERE `email`='$memail';";
				mysql_query($sql);
				$message = $email . " has been updated.";
			} else {
				$sql = "INSERT INTO `domainer_elite`.`members` (`email`, `software`, `software_pro`, `webinars`, `assistance`, `marketplace`, `marketplace_unlimited`, `ultimate_download`, `special_project`, `active`, `firstname`, `lastname`, `about`, `contactemail`, `website`, `facebook`, `twitter`, `free_webinar_start_time`, `free_webinar_url`) VALUES ('$memail', '{$_POST['software']}', '{$_POST['software_pro']}', '{$_POST['webinars']}', '{$_POST['assistance']}', '{$_POST['marketplace']}', '{$_POST['marketplace_unlimited']}', '{$_POST['ultimate_download']}', '{$_POST['special_project']}', '{$_POST['active']}', '{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['about']}', '{$_POST['contactemail']}', '{$_POST['website']}', '{$_POST['facebook']}', '{$_POST['twitter']}', '0000-00-00 00:00:00', '{$_POST['free_webinar_url']}');";
				mysql_query($sql);
				$message = $email . " has been added.";
			}
		}
		else {
			$message = "<span style='color: red'>Please enter an email address</span>";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add Member</title>
		<style>
			body {
				font-family: Arial, Helvetica, sans-serif;
			}
		</style>
	</head>
	<body>
		<h1>Add Member</h1>
		<?php if ($message): ?>
			<strong><?php echo $message; ?></strong>
		<? endif; ?>
		<form action="add_member.php" method="post">
			<table>
				<tr>
					<td>Email: </td>
					<td>
						<input type="text" name="email" />
					</td>
				</tr>
				<tr>
					<td>Software Access: </td>
					<td><label for="software">N <input type="radio" name="software" value="N" /></label>  <label for="software">Y <input type="radio" name="software" value="Y" checked="checked" /></label> </td>
				</tr>
				<tr>
					<td>Software Pro Access: </td>
					<td><label for="software_pro">N <input type="radio" name="software_pro" value="N" /></label>  <label for="software_pro">Y <input type="radio" name="software_pro" value="Y" checked="checked" /></label> </td>
				</tr>
				<tr>
					<td>Webinar Access: </td>
					<td><label for="webinars">N <input type="radio" name="webinars" value="N" /></label> <label for="webinars">Y <input type="radio" name="webinars" value="Y" checked="checked" /></label> </td>
				</tr>
				<tr>
					<td>Assistance Access: </td>
					<td><label for="assistance">N <input type="radio" name="assistance" value="N" /></label> <label for="assistance">Y <input type="radio" name="assistance" value="Y" checked="checked" /></label> </td>
				</tr>
				<tr>
					<td>Marketplace Access: </td>
					<td><label for="marketplace">N <input type="radio" name="marketplace" value="N" /></label> <label for="marketplace">Y <input type="radio" name="marketplace" value="Y" checked="checked" /></label> </td>
				</tr>
				<tr>
					<td>Marketplace Unlimited Access: </td>
					<td><label for="marketplace_unlimited">N <input type="radio" name="marketplace_unlimited" value="N" /></label> <label for="marketplace_unlimited">Y <input type="radio" name="marketplace_unlimited" value="Y" checked="checked" /></label> </td>
				</tr>
				<tr>
					<td>Ultimate Download Access: </td>
					<td><label for="ultimate_download">N <input type="radio" name="ultimate_download" value="N" /></label> <label for="ultimate_download">Y <input type="radio" name="ultimate_download" value="Y" checked="checked" /></label> </td>
				</tr>
				<tr>
					<td>Special Project Access: </td>
					<td><label for="special_project">N <input type="radio" name="special_project" value="N" /></label> <label for="special_project">Y <input type="radio" name="special_project" value="Y" checked="checked" /></label> </td>
				</tr>
				<tr>
					<td>Active User: </td>
					<td><label for="active">N <input type="radio" name="active" value="N" /></label> <label for="active">Y <input type="radio" name="active" value="Y" checked="checked" /></label> </td>
				</tr>
				<tr>
					<td>First Name: </td>
					<td>
						<input type="text" name="firstname" />
					</td>
				</tr>
				<tr>
					<td>Last Name: </td>
					<td>
						<input type="text" name="lastname" />
					</td>
				</tr>
				<tr>
					<td>About: </td>
					<td>
						<input type="text" name="about" />
					</td>
				</tr>
				<tr>
					<td>Contact Email: </td>
					<td>
						<input type="text" name="contactemail" />
					</td>
				</tr>
				<tr>
					<td>Website: </td>
					<td>
						<input type="text" name="website" />
					</td>
				</tr>
				<tr>
					<td>Facebook: </td>
					<td>
						<input type="text" name="facebook" />
					</td>
				</tr>
				<tr>
					<td>Twitter: </td>
					<td>
						<input type="text" name="twitter" />
					</td>
				</tr>
				<tr>
					<td>Free Webinar Url: </td>
					<td>
						<input type="text" name="free_webinar_url" />
					</td>
				</tr>
			</table>
			<input type="submit" name="submit" value="submit" />
		</form>
	</body>
</html>