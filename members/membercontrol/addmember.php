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
				$query = "UPDATE members SET software='{$_POST['software']}', webinars='{$_POST['webinars']}', assistance='{$_POST['assistance']}' WHERE email='$memail'";
				mysql_query($query);
				$message = $email . " has been updated.";
			} else {
				$query = "INSERT INTO members SET email='$memail', software='{$_POST['software']}', webinars='{$_POST['webinars']}', assistance='{$_POST['assistance']}'";
				mysql_query($query);
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
<? endif ?>
<form action="addmember.php" method="post">
<table>
<tr>
<td>Email: </td>
<td>
<input type="text" name="email" />
</td>
</tr>
<td>Software Access: </td>
<td><label for="software">N <input type="radio" name="software" value="N" checked="checked" /></label>  <label for="software">Y <input type="radio" name="software" value="Y" /></label> </td>
</tr>
<tr>
<td>Webinar Access: </td>
<td><label for="webinars">N <input type="radio" name="webinars" value="N" checked="checked" /></label> <label for="webinars">Y <input type="radio" name="webinars" value="Y" /></label> </td>
</tr>
<tr>
<td>Assistance Access: </td>
<td><label for="assistance">N <input type="radio" name="assistance" value="N" checked="checked" /></label> <label for="assistance">Y <input type="radio" name="assistance" value="Y" /></label> </td>
</tr>
</table>
<input type="submit" name="submit" value="submit" />
</form>
</body>
</html>