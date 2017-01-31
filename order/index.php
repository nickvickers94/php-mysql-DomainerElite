<?php
	ini_set('session.cookie_domain', '.thelastgoldmine.com');
	session_start();
	if ($_REQUEST['p']) {
		parse_str(base64_decode($_REQUEST['p']),$vals);
		$p = $_REQUEST['p'];
	}
	global $firstname;
	global $lastname;
	global $email;
	global $subname;
	global $subemail;
	$site = $vals['site'];
	$heading = $vals['heading'];
	$pname = $vals['pname'];
	$pdesc = $vals['pdesc'];
	$price = $vals['price'];
	$rebillprice = $vals["rebillprice"];
	$bill = $vals['bill'];
	$exiturl = $vals['exitURL'];
	$returnurl = $vals['returnURL'];
	$quantity = $vals['quantity'];
	$item = $vals['item'];
	$campaign = $vals['campaign'];
	$existingSubscriberID = $_REQUEST['existingSubscriber'];
	$firstname = $_REQUEST['first_name'];
	$lastname = $_REQUEST['last_name'];
	$phone = $_REQUEST['primary_phone'];
	$email = $_REQUEST['email'];
	$address = $_REQUEST['billing_address'];
	$city = $_REQUEST['billing_city'];
	$country = $_REQUEST['billing_country'];
	$state = $_REQUEST['billing_state'];
	$zip = $_REQUEST['billing_zip'];
	$subemail = $vals['subemail'];
	$subname = $vals['subname'];
	if ($_POST) {
		$_SESSION = $_POST;
	}
		$_REQUEST = $_SESSION;
	
	if ($bill == 'once') {
		$billed = $price;
	} else {
		if ($bill == 'trial') {
			$totalOccurrences = 2;
		} else {
			$totalOccurrences = 9999;
		}
		$billed = $rebillprice;
	}	
	if ($exiturl) {
		$exiturl .= '?' . implode('&',array("first_name=$firstname", "last_name=$lastname", "primary_phone=$phone", "email=$email", "email_again=$email", "billing_address=$address", "billing_city=$city", "billing_country=$country", "billing_state=$state", "billing_zip=$zip"));
	}
if (empty($_POST)) {
	displayForm();
} else {
	if ($errors = errors()) {
		displayForm($errors, 'Please correct the following errors:');
	} else {
		if ($errors = processPayment()) {
			displayForm($errors, 'Transaction Declined');
		} else {
			displayForm();
		}
	}
} 

?>
<?php function displayForm($errors = null, $message = null) { ?>
<?php global $site, $heading, $pname, $pdesc, $price, $bill, $billed, $exit, $exiturl, $returnurl, $p, $existingSubscriberID, $subemail, $subname; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Secure Order</title>

<link href="css/checkout.css" rel="stylesheet" type="text/css" />
<?php if ($exiturl): ?>
<script type="text/javascript">
	var epc_disable = false; 
	var epc_message_html = "<p>***************************************<br/>W A I T   B E F O R E   Y O U   G O !<br/>CLICK THE *CANCEL* BUTTON RIGHT NOW<br/>STAY ON THE CURRENT PAGE.<br/>I HAVE SOMETHING VERY SPECIAL FOR YOU!<br/>ATTENTION: YOU WILL ONLY SEE THIS ONCE!<br/>***************************************</p>";
	var epc_message_alert = "'***************************************\n\nW A I T   B E F O R E   Y O U   G O !\n\n  CLICK THE *CANCEL* BUTTON RIGHT NOW\n     TO STAY ON THE CURRENT PAGE.\n\n I HAVE SOMETHING VERY SPECIAL FOR YOU!\n\n ATTENTION: YOU WILL ONLY SEE THIS ONCE!\n\n***************************************';";
	var epc_continue = "top.location = '<?php echo $exiturl; ?>'";
</script>

<script src="epc/epc_alert.js" type="text/javascript"></script>
<link href="epc/epc.css" rel="stylesheet" type="text/css" />
<?php endif ?>
<!--[if IE]>
		<link href="IE.css" rel="stylesheet" type="text/css" />
		<![endif]-->
</head>
<body id="orderPage">
<center>
<img src="images/logo.png" style="margin-top: 15px; max-height: 150px;" />
</center>
<div id="bodyArea">
	<div id="bodyAreaWrap">
		<div id="header">
			<div id="lock">
				<p>Secure Payment Website for: <br>
					<strong><?php echo $site; ?></strong></p>
			</div>
			<img src="images/secure_payment_logo.jpg" alt="" style="padding: 20px 0pt 0pt 30px;">
			<div class="clear"></div>
		</div>
		<div id="mainContent">
		 
		  <?php if ($errors): ?>
  
  <!-- content box -->

       		<!-- content heading -->
            	<h2 style="color: #b50007; font-weight: bold; font-size: 14px">Order Result</h2> 
<h2 style="font-weight: bold;"><?php echo $message; ?></h2>
<ul style="margin-left: 20px">
<?php if ($errors[1]): ?>
<?php foreach ($errors[1] as $error): ?>
<li><?php echo $error; ?></li>
<?php endforeach ?>
<?php endif ?>
</ul>
<?php endif ?>
		
		<h3><?php echo $heading; ?></h3><br />
			<div id="orderTblWrap">
				<div id="orderTblHeader">SECURE PAYMENT FORM <span>128-BIT ENCRYPTION TECHNOLOGY FOR YOUR PROTECTION</span></div>
				<table id="orderform-tbl-order-info-step1" class="orderform-tbl-order-info" border="1" cellpadding="2" cellspacing="0" width="100%">
					<tbody>
						<tr class="orderform-section-subheadline">
							<td class="orderform-td-product" align="center"><font id="titleProduct" color="#000000" face="Arial, Helvetica, sans-serif" size="2"><b>Product</b></font></td>
							<td class="orderform-td-quantity" align="center"><font id="orderform-td-product-quantity-title" color="#000000" face="Arial, Helvetica, sans-serif" size="2"><b>Quantity</b></font></td>
							<td class="orderform-td-price" align="center" nowrap="nowrap"><font id="pricePerUnit" color="#000000" face="Arial, Helvetica, sans-serif" size="2"><b>Price per Unit</b></font></td>
							<td class="orderform-td-total" align="center" nowrap="nowrap"><font id="orderform-total-title" color="#000000" face="Arial, Helvetica, sans-serif" size="2"><b>Total</b></font></td>
						</tr>
						<tr class="orderform-info-row">
							<td class="orderform-td-product" valign="top"></font><font class="orderform-product-name" color="#000000" face="Arial, Helvetica, sans-serif" size="2"> <?php echo $pdesc; ?></font><br></td>
							<td class="orderform-td-quantity" valign="top"><span style="white-space: nowrap;"></span></td>
							<td class="orderform-td-price" align="center" valign="top"><font color="#000000" face="Arial, Helvetica, sans-serif" size="2">$<?php echo $price; ?></font></td>
							<td class="orderform-td-total" align="center" valign="top"><font color="#000000" face="Arial, Helvetica, sans-serif" size="2">$<?php echo $price; ?></font></td>
						</tr>
					</tbody>
				</table>
			</div>
			<h3>EZ Checkout</h3>
			<div id="payment_box">
				<form action='index.php' method='POST' name='order_form'>
				
		<style type='text/css'>
			#order_form .error, #order_form .form_error {
				color: red;
			}
		</style>
		<script language='javascript'>
			function toggle_billing_state_order_form() {
				var sel_country = $('#order_form select[name=billing_country] option:selected')[0].value;
				if (sel_country == '' || sel_country == 'US' || sel_country == 'CA') {
					$('#order_form select[name=billing_state]').show();
					$('#order_form input[name=billing_state_other]').hide();
				}
				else {
					$('#order_form select[name=billing_state]').hide();
					$('#order_form input[name=billing_state_other]').show();
				}
			}
			
		
			$(function() {
				toggle_billing_state_order_form();
				$('#order_form select[name=billing_country]').change(toggle_billing_state_order_form);
			});
		</script>
	<div id='order_form'><input name='partial_order_required_fields' type='hidden' value=''><table border='0' cellpadding='0' cellspacing='0' class='form_table'><tr class='_contact_info'><td class='section' colspan='2'><div>Contact Information</div></td></tr>
	<tr class='first_name'>
	<td class='label'><div class="<?php echo $errors[0][first_name]; ?>">First Name</div></td>
	<td class='field'><div><input name='first_name' type='text' value='<?php echo $_REQUEST['first_name']; ?>'></div></td></tr>
	<tr class='last_name'><td class='label'><div class="<?php echo $errors[0][last_name]; ?>">Last Name</div></td><td class='field'><div><input name='last_name' type='text' value='<?php echo $_REQUEST['last_name']; ?>'></div></td></tr>
	<tr class='primary_phone'><td class='label'><div class="<?php echo $errors[0][primary_phone]; ?>">Phone</div></td><td class='field'><div><input name='primary_phone' type='text' value='<?php echo $_REQUEST['primary_phone']; ?>'></div></td></tr>
	<tr class='email'><td class='label'><div class="<?php echo $errors[0][email]; ?>">Email</div></td><td class='field'><div><input name='email' type='text' value='<?php echo $_REQUEST['email']; ?>'></div></td></tr>
	<tr class='email_again'><td class='label'><div class="<?php echo $errors[0][email_again]; ?>">Re-type Email</div></td><td class='field'><div><input name='email_again' type='text' value='<?php echo $_REQUEST['email_again']; ?>'></div></td></tr>
	<tr class='_billing_address'><td class='section' colspan='2'><div>Billing Address</div></td></tr>
	<tr class='billing_country'><td class='label'><div class="<?php echo $errors[0][billing_country]; ?>">Country</div></td><td class='field'><div><select name='billing_country'>
<option selected='1' value=''>[Pick One]</option>
<option value='US' <?php if ($_REQUEST['billing_country'] == 'US') echo "selected='selected'"; ?>>United States</option>
<option value='AF' <?php if ($_REQUEST['billing_country'] == 'AF') echo "selected='selected'"; ?>>Afghanistan</option>
<option value='AX' <?php if ($_REQUEST['billing_country'] == 'AX') echo "selected='selected'"; ?>>Aland Islands</option>
<option value='AL' <?php if ($_REQUEST['billing_country'] == 'AL') echo "selected='selected'"; ?>>Albania</option>
<option value='DZ' <?php if ($_REQUEST['billing_country'] == 'DZ') echo "selected='selected'"; ?>>Algeria</option>
<option value='AS' <?php if ($_REQUEST['billing_country'] == 'AS') echo "selected='selected'"; ?>>American Samoa</option>
<option value='AD' <?php if ($_REQUEST['billing_country'] == 'AD') echo "selected='selected'"; ?>>Andorra</option>
<option value='AO' <?php if ($_REQUEST['billing_country'] == 'AO') echo "selected='selected'"; ?>>Angola</option>
<option value='AI' <?php if ($_REQUEST['billing_country'] == 'AI') echo "selected='selected'"; ?>>Anguilla</option>
<option value='AQ' <?php if ($_REQUEST['billing_country'] == 'AQ') echo "selected='selected'"; ?>>Antarctica</option>
<option value='AG' <?php if ($_REQUEST['billing_country'] == 'AG') echo "selected='selected'"; ?>>Antigua and Barbuda</option>
<option value='AR' <?php if ($_REQUEST['billing_country'] == 'AR') echo "selected='selected'"; ?>>Argentina</option>
<option value='AM' <?php if ($_REQUEST['billing_country'] == 'AM') echo "selected='selected'"; ?>>Armenia</option>
<option value='AW' <?php if ($_REQUEST['billing_country'] == 'AW') echo "selected='selected'"; ?>>Aruba</option>
<option value='AC' <?php if ($_REQUEST['billing_country'] == 'AC') echo "selected='selected'"; ?>>Ascension Island</option>
<option value='AU' <?php if ($_REQUEST['billing_country'] == 'AU') echo "selected='selected'"; ?>>Australia</option>
<option value='AT' <?php if ($_REQUEST['billing_country'] == 'AT') echo "selected='selected'"; ?>>Austria</option>
<option value='AZ' <?php if ($_REQUEST['billing_country'] == 'AZ') echo "selected='selected'"; ?>>Azerbaijan</option>
<option value='BS' <?php if ($_REQUEST['billing_country'] == 'BS') echo "selected='selected'"; ?>>Bahamas</option>
<option value='BH' <?php if ($_REQUEST['billing_country'] == 'BH') echo "selected='selected'"; ?>>Bahrain</option>
<option value='BB' <?php if ($_REQUEST['billing_country'] == 'BB') echo "selected='selected'"; ?>>Barbados</option>
<option value='BD' <?php if ($_REQUEST['billing_country'] == 'BD') echo "selected='selected'"; ?>>Bangladesh</option>
<option value='BY' <?php if ($_REQUEST['billing_country'] == 'BY') echo "selected='selected'"; ?>>Belarus</option>
<option value='BE' <?php if ($_REQUEST['billing_country'] == 'BE') echo "selected='selected'"; ?>>Belgium</option>
<option value='BZ' <?php if ($_REQUEST['billing_country'] == 'BZ') echo "selected='selected'"; ?>>Belize</option>
<option value='BJ' <?php if ($_REQUEST['billing_country'] == 'BJ') echo "selected='selected'"; ?>>Benin</option>
<option value='BM' <?php if ($_REQUEST['billing_country'] == 'BM') echo "selected='selected'"; ?>>Bermuda</option>
<option value='BT' <?php if ($_REQUEST['billing_country'] == 'BT') echo "selected='selected'"; ?>>Bhutan</option>
<option value='BW' <?php if ($_REQUEST['billing_country'] == 'BW') echo "selected='selected'"; ?>>Botswana</option>
<option value='BO' <?php if ($_REQUEST['billing_country'] == 'BO') echo "selected='selected'"; ?>>Bolivia</option>
<option value='BA' <?php if ($_REQUEST['billing_country'] == 'BA') echo "selected='selected'"; ?>>Bosnia and Herzegovina</option>
<option value='BV' <?php if ($_REQUEST['billing_country'] == 'BV') echo "selected='selected'"; ?>>Bouvet Island</option>
<option value='BR' <?php if ($_REQUEST['billing_country'] == 'BR') echo "selected='selected'"; ?>>Brazil</option>
<option value='IO' <?php if ($_REQUEST['billing_country'] == 'IO') echo "selected='selected'"; ?>>British Indian Ocean Territory</option>
<option value='BN' <?php if ($_REQUEST['billing_country'] == 'BN') echo "selected='selected'"; ?>>Brunei Darussalam</option>
<option value='BG' <?php if ($_REQUEST['billing_country'] == 'BG') echo "selected='selected'"; ?>>Bulgaria</option>
<option value='BF' <?php if ($_REQUEST['billing_country'] == 'BF') echo "selected='selected'"; ?>>Burkina Faso</option>
<option value='BI' <?php if ($_REQUEST['billing_country'] == 'BI') echo "selected='selected'"; ?>>Burundi</option>
<option value='KH' <?php if ($_REQUEST['billing_country'] == 'KH') echo "selected='selected'"; ?>>Cambodia</option>
<option value='CM' <?php if ($_REQUEST['billing_country'] == 'CM') echo "selected='selected'"; ?>>Cameroon</option>
<option value='CA' <?php if ($_REQUEST['billing_country'] == 'CA') echo "selected='selected'"; ?>>Canada</option>
<option value='CV' <?php if ($_REQUEST['billing_country'] == 'CV') echo "selected='selected'"; ?>>Cape Verde</option>
<option value='KY' <?php if ($_REQUEST['billing_country'] == 'KY') echo "selected='selected'"; ?>>Cayman Islands</option>
<option value='CF' <?php if ($_REQUEST['billing_country'] == 'CF') echo "selected='selected'"; ?>>Central African Republic</option>
<option value='TD' <?php if ($_REQUEST['billing_country'] == 'TD') echo "selected='selected'"; ?>>Chad</option>
<option value='CL' <?php if ($_REQUEST['billing_country'] == 'CL') echo "selected='selected'"; ?>>Chile</option>
<option value='CN' <?php if ($_REQUEST['billing_country'] == 'CN') echo "selected='selected'"; ?>>China</option>
<option value='CX' <?php if ($_REQUEST['billing_country'] == 'CX') echo "selected='selected'"; ?>>Christmas Island</option>
<option value='CC' <?php if ($_REQUEST['billing_country'] == 'CC') echo "selected='selected'"; ?>>Cocos (Keeling) Islands</option>
<option value='CO' <?php if ($_REQUEST['billing_country'] == 'CO') echo "selected='selected'"; ?>>Colombia</option>
<option value='KM' <?php if ($_REQUEST['billing_country'] == 'KM') echo "selected='selected'"; ?>>Comoros</option>
<option value='CG' <?php if ($_REQUEST['billing_country'] == 'CG') echo "selected='selected'"; ?>>Congo</option>
<option value='CD' <?php if ($_REQUEST['billing_country'] == 'CD') echo "selected='selected'"; ?>>Congo, Democratic Republic</option>
<option value='CK' <?php if ($_REQUEST['billing_country'] == 'CK') echo "selected='selected'"; ?>>Cook Islands</option>
<option value='CR' <?php if ($_REQUEST['billing_country'] == 'CR') echo "selected='selected'"; ?>>Costa Rica</option>
<option value='CI' <?php if ($_REQUEST['billing_country'] == 'CI') echo "selected='selected'"; ?>>Cote D'Ivoire (Ivory Coast)</option>
<option value='HR' <?php if ($_REQUEST['billing_country'] == 'HR') echo "selected='selected'"; ?>>Croatia (Hrvatska)</option>
<option value='CU' <?php if ($_REQUEST['billing_country'] == 'CU') echo "selected='selected'"; ?>>Cuba</option>
<option value='CY' <?php if ($_REQUEST['billing_country'] == 'CY') echo "selected='selected'"; ?>>Cyprus</option>
<option value='CZ' <?php if ($_REQUEST['billing_country'] == 'CZ') echo "selected='selected'"; ?>>Czech Republic</option>
<option value='DK' <?php if ($_REQUEST['billing_country'] == 'DK') echo "selected='selected'"; ?>>Denmark</option>
<option value='DJ' <?php if ($_REQUEST['billing_country'] == 'DJ') echo "selected='selected'"; ?>>Djibouti</option>
<option value='DM' <?php if ($_REQUEST['billing_country'] == 'DM') echo "selected='selected'"; ?>>Dominica</option>
<option value='DO' <?php if ($_REQUEST['billing_country'] == 'DO') echo "selected='selected'"; ?>>Dominican Republic</option>
<option value='TP' <?php if ($_REQUEST['billing_country'] == 'TP') echo "selected='selected'"; ?>>East Timor</option>
<option value='EC' <?php if ($_REQUEST['billing_country'] == 'EC') echo "selected='selected'"; ?>>Ecuador</option>
<option value='EG' <?php if ($_REQUEST['billing_country'] == 'EG') echo "selected='selected'"; ?>>Egypt</option>
<option value='SV' <?php if ($_REQUEST['billing_country'] == 'SV') echo "selected='selected'"; ?>>El Salvador</option>
<option value='GQ' <?php if ($_REQUEST['billing_country'] == 'GQ') echo "selected='selected'"; ?>>Equatorial Guinea</option>
<option value='ER' <?php if ($_REQUEST['billing_country'] == 'ER') echo "selected='selected'"; ?>>Eritrea</option>
<option value='EE' <?php if ($_REQUEST['billing_country'] == 'EE') echo "selected='selected'"; ?>>Estonia</option>
<option value='ET' <?php if ($_REQUEST['billing_country'] == 'ET') echo "selected='selected'"; ?>>Ethiopia</option>
<option value='FK' <?php if ($_REQUEST['billing_country'] == 'FK') echo "selected='selected'"; ?>>Falkland Islands (Malvinas)</option>
<option value='FO' <?php if ($_REQUEST['billing_country'] == 'FO') echo "selected='selected'"; ?>>Faroe Islands</option>
<option value='FJ' <?php if ($_REQUEST['billing_country'] == 'FJ') echo "selected='selected'"; ?>>Fiji</option>
<option value='FI' <?php if ($_REQUEST['billing_country'] == 'FI') echo "selected='selected'"; ?>>Finland</option>
<option value='FR' <?php if ($_REQUEST['billing_country'] == 'FR') echo "selected='selected'"; ?>>France</option>
<option value='FX' <?php if ($_REQUEST['billing_country'] == 'FX') echo "selected='selected'"; ?>>France, Metropolitan</option>
<option value='GF' <?php if ($_REQUEST['billing_country'] == 'GF') echo "selected='selected'"; ?>>French Guiana</option>
<option value='PF' <?php if ($_REQUEST['billing_country'] == 'PF') echo "selected='selected'"; ?>>French Polynesia</option>
<option value='TF' <?php if ($_REQUEST['billing_country'] == 'TF') echo "selected='selected'"; ?>>French Southern Territories</option>
<option value='MK' <?php if ($_REQUEST['billing_country'] == 'MK') echo "selected='selected'"; ?>>F.Y.R.O.M. (Macedonia)</option>
<option value='GA' <?php if ($_REQUEST['billing_country'] == 'GA') echo "selected='selected'"; ?>>Gabon</option>
<option value='GM' <?php if ($_REQUEST['billing_country'] == 'GM') echo "selected='selected'"; ?>>Gambia</option>
<option value='GE' <?php if ($_REQUEST['billing_country'] == 'GE') echo "selected='selected'"; ?>>Georgia</option>
<option value='DE' <?php if ($_REQUEST['billing_country'] == 'DE') echo "selected='selected'"; ?>>Germany</option>
<option value='GH' <?php if ($_REQUEST['billing_country'] == 'GH') echo "selected='selected'"; ?>>Ghana</option>
<option value='GI' <?php if ($_REQUEST['billing_country'] == 'GI') echo "selected='selected'"; ?>>Gibraltar</option>
<option value='GB' <?php if ($_REQUEST['billing_country'] == 'GB') echo "selected='selected'"; ?>>Great Britain (UK)</option>
<option value='GR' <?php if ($_REQUEST['billing_country'] == 'GR') echo "selected='selected'"; ?>>Greece</option>
<option value='GL' <?php if ($_REQUEST['billing_country'] == 'GL') echo "selected='selected'"; ?>>Greenland</option>
<option value='GD' <?php if ($_REQUEST['billing_country'] == 'GD') echo "selected='selected'"; ?>>Grenada</option>
<option value='GP' <?php if ($_REQUEST['billing_country'] == 'GP') echo "selected='selected'"; ?>>Guadeloupe</option>
<option value='GU' <?php if ($_REQUEST['billing_country'] == 'GU') echo "selected='selected'"; ?>>Guam</option>
<option value='GT' <?php if ($_REQUEST['billing_country'] == 'GT') echo "selected='selected'"; ?>>Guatemala</option>
<option value='GG' <?php if ($_REQUEST['billing_country'] == 'GG') echo "selected='selected'"; ?>>Guernsey</option>
<option value='GN' <?php if ($_REQUEST['billing_country'] == 'GN') echo "selected='selected'"; ?>>Guinea</option>
<option value='GW' <?php if ($_REQUEST['billing_country'] == 'GW') echo "selected='selected'"; ?>>Guinea-Bissau</option>
<option value='GY' <?php if ($_REQUEST['billing_country'] == 'GY') echo "selected='selected'"; ?>>Guyana</option>
<option value='HT' <?php if ($_REQUEST['billing_country'] == 'HT') echo "selected='selected'"; ?>>Haiti</option>
<option value='HM' <?php if ($_REQUEST['billing_country'] == 'HM') echo "selected='selected'"; ?>>Heard and McDonald Islands</option>
<option value='HN' <?php if ($_REQUEST['billing_country'] == 'HN') echo "selected='selected'"; ?>>Honduras</option>
<option value='HK' <?php if ($_REQUEST['billing_country'] == 'HK') echo "selected='selected'"; ?>>Hong Kong</option>
<option value='HU' <?php if ($_REQUEST['billing_country'] == 'HU') echo "selected='selected'"; ?>>Hungary</option>
<option value='IS' <?php if ($_REQUEST['billing_country'] == 'IS') echo "selected='selected'"; ?>>Iceland</option>
<option value='IN' <?php if ($_REQUEST['billing_country'] == 'IN') echo "selected='selected'"; ?>>India</option>
<option value='ID' <?php if ($_REQUEST['billing_country'] == 'ID') echo "selected='selected'"; ?>>Indonesia</option>
<option value='IR' <?php if ($_REQUEST['billing_country'] == 'IR') echo "selected='selected'"; ?>>Iran</option>
<option value='IQ' <?php if ($_REQUEST['billing_country'] == 'IQ') echo "selected='selected'"; ?>>Iraq</option>
<option value='IE' <?php if ($_REQUEST['billing_country'] == 'IE') echo "selected='selected'"; ?>>Ireland</option>
<option value='IL' <?php if ($_REQUEST['billing_country'] == 'IL') echo "selected='selected'"; ?>>Israel</option>
<option value='IM' <?php if ($_REQUEST['billing_country'] == 'IM') echo "selected='selected'"; ?>>Isle of Man</option>
<option value='IT' <?php if ($_REQUEST['billing_country'] == 'IT') echo "selected='selected'"; ?>>Italy</option>
<option value='JE' <?php if ($_REQUEST['billing_country'] == 'JE') echo "selected='selected'"; ?>>Jersey</option>
<option value='JM' <?php if ($_REQUEST['billing_country'] == 'JM') echo "selected='selected'"; ?>>Jamaica</option>
<option value='JP' <?php if ($_REQUEST['billing_country'] == 'JP') echo "selected='selected'"; ?>>Japan</option>
<option value='JO' <?php if ($_REQUEST['billing_country'] == 'JO') echo "selected='selected'"; ?>>Jordan</option>
<option value='KZ' <?php if ($_REQUEST['billing_country'] == 'KZ') echo "selected='selected'"; ?>>Kazakhstan</option>
<option value='KE' <?php if ($_REQUEST['billing_country'] == 'KE') echo "selected='selected'"; ?>>Kenya</option>
<option value='KI' <?php if ($_REQUEST['billing_country'] == 'KI') echo "selected='selected'"; ?>>Kiribati</option>
<option value='KP' <?php if ($_REQUEST['billing_country'] == 'KP') echo "selected='selected'"; ?>>Korea (North)</option>
<option value='KR' <?php if ($_REQUEST['billing_country'] == 'KR') echo "selected='selected'"; ?>>Korea (South)</option>
<option value='KW' <?php if ($_REQUEST['billing_country'] == 'KW') echo "selected='selected'"; ?>>Kuwait</option>
<option value='KG' <?php if ($_REQUEST['billing_country'] == 'KG') echo "selected='selected'"; ?>>Kyrgyzstan</option>
<option value='LA' <?php if ($_REQUEST['billing_country'] == 'LA') echo "selected='selected'"; ?>>Laos</option>
<option value='LV' <?php if ($_REQUEST['billing_country'] == 'LV') echo "selected='selected'"; ?>>Latvia</option>
<option value='LB' <?php if ($_REQUEST['billing_country'] == 'LB') echo "selected='selected'"; ?>>Lebanon</option>
<option value='LI' <?php if ($_REQUEST['billing_country'] == 'LI') echo "selected='selected'"; ?>>Liechtenstein</option>
<option value='LR' <?php if ($_REQUEST['billing_country'] == 'LR') echo "selected='selected'"; ?>>Liberia</option>
<option value='LY' <?php if ($_REQUEST['billing_country'] == 'LY') echo "selected='selected'"; ?>>Libya</option>
<option value='LS' <?php if ($_REQUEST['billing_country'] == 'LS') echo "selected='selected'"; ?>>Lesotho</option>
<option value='LT' <?php if ($_REQUEST['billing_country'] == 'LT') echo "selected='selected'"; ?>>Lithuania</option>
<option value='LU' <?php if ($_REQUEST['billing_country'] == 'LU') echo "selected='selected'"; ?>>Luxembourg</option>
<option value='MO' <?php if ($_REQUEST['billing_country'] == 'MO') echo "selected='selected'"; ?>>Macau</option>
<option value='MG' <?php if ($_REQUEST['billing_country'] == 'MG') echo "selected='selected'"; ?>>Madagascar</option>
<option value='MW' <?php if ($_REQUEST['billing_country'] == 'MW') echo "selected='selected'"; ?>>Malawi</option>
<option value='MY' <?php if ($_REQUEST['billing_country'] == 'MY') echo "selected='selected'"; ?>>Malaysia</option>
<option value='MV' <?php if ($_REQUEST['billing_country'] == 'MV') echo "selected='selected'"; ?>>Maldives</option>
<option value='ML' <?php if ($_REQUEST['billing_country'] == 'ML') echo "selected='selected'"; ?>>Mali</option>
<option value='MT' <?php if ($_REQUEST['billing_country'] == 'MT') echo "selected='selected'"; ?>>Malta</option>
<option value='MH' <?php if ($_REQUEST['billing_country'] == 'MH') echo "selected='selected'"; ?>>Marshall Islands</option>
<option value='MQ' <?php if ($_REQUEST['billing_country'] == 'MQ') echo "selected='selected'"; ?>>Martinique</option>
<option value='MR' <?php if ($_REQUEST['billing_country'] == 'MR') echo "selected='selected'"; ?>>Mauritania</option>
<option value='MU' <?php if ($_REQUEST['billing_country'] == 'MU') echo "selected='selected'"; ?>>Mauritius</option>
<option value='YT' <?php if ($_REQUEST['billing_country'] == 'YT') echo "selected='selected'"; ?>>Mayotte</option>
<option value='MX' <?php if ($_REQUEST['billing_country'] == 'MX') echo "selected='selected'"; ?>>Mexico</option>
<option value='FM' <?php if ($_REQUEST['billing_country'] == 'FM') echo "selected='selected'"; ?>>Micronesia</option>
<option value='MD' <?php if ($_REQUEST['billing_country'] == 'MD') echo "selected='selected'"; ?>>Moldova</option>
<option value='MC' <?php if ($_REQUEST['billing_country'] == 'MC') echo "selected='selected'"; ?>>Monaco</option>
<option value='MN' <?php if ($_REQUEST['billing_country'] == 'MN') echo "selected='selected'"; ?>>Mongolia</option>
<option value='ME' <?php if ($_REQUEST['billing_country'] == 'ME') echo "selected='selected'"; ?>>Montenegro</option>
<option value='MS' <?php if ($_REQUEST['billing_country'] == 'MS') echo "selected='selected'"; ?>>Montserrat</option>
<option value='MA' <?php if ($_REQUEST['billing_country'] == 'MA') echo "selected='selected'"; ?>>Morocco</option>
<option value='MZ' <?php if ($_REQUEST['billing_country'] == 'MZ') echo "selected='selected'"; ?>>Mozambique</option>
<option value='MM' <?php if ($_REQUEST['billing_country'] == 'MM') echo "selected='selected'"; ?>>Myanmar</option>
<option value='NA' <?php if ($_REQUEST['billing_country'] == 'NA') echo "selected='selected'"; ?>>Namibia</option>
<option value='NR' <?php if ($_REQUEST['billing_country'] == 'NR') echo "selected='selected'"; ?>>Nauru</option>
<option value='NP' <?php if ($_REQUEST['billing_country'] == 'NP') echo "selected='selected'"; ?>>Nepal</option>
<option value='NL' <?php if ($_REQUEST['billing_country'] == 'NL') echo "selected='selected'"; ?>>Netherlands</option>
<option value='AN' <?php if ($_REQUEST['billing_country'] == 'AN') echo "selected='selected'"; ?>>Netherlands Antilles</option>
<option value='NT' <?php if ($_REQUEST['billing_country'] == 'NT') echo "selected='selected'"; ?>>Neutral Zone</option>
<option value='NC' <?php if ($_REQUEST['billing_country'] == 'NC') echo "selected='selected'"; ?>>New Caledonia</option>
<option value='NZ' <?php if ($_REQUEST['billing_country'] == 'NZ') echo "selected='selected'"; ?>>New Zealand (Aotearoa)</option>
<option value='NI' <?php if ($_REQUEST['billing_country'] == 'NI') echo "selected='selected'"; ?>>Nicaragua</option>
<option value='NE' <?php if ($_REQUEST['billing_country'] == 'NE') echo "selected='selected'"; ?>>Niger</option>
<option value='NG' <?php if ($_REQUEST['billing_country'] == 'NG') echo "selected='selected'"; ?>>Nigeria</option>
<option value='NU' <?php if ($_REQUEST['billing_country'] == 'NU') echo "selected='selected'"; ?>>Niue</option>
<option value='NF' <?php if ($_REQUEST['billing_country'] == 'NF') echo "selected='selected'"; ?>>Norfolk Island</option>
<option value='MP' <?php if ($_REQUEST['billing_country'] == 'MP') echo "selected='selected'"; ?>>Northern Mariana Islands</option>
<option value='NO' <?php if ($_REQUEST['billing_country'] == 'NO') echo "selected='selected'"; ?>>Norway</option>
<option value='OM' <?php if ($_REQUEST['billing_country'] == 'OM') echo "selected='selected'"; ?>>Oman</option>
<option value='PK' <?php if ($_REQUEST['billing_country'] == 'PK') echo "selected='selected'"; ?>>Pakistan</option>
<option value='PW' <?php if ($_REQUEST['billing_country'] == 'PW') echo "selected='selected'"; ?>>Palau</option>
<option value='PS' <?php if ($_REQUEST['billing_country'] == 'PS') echo "selected='selected'"; ?>>Palestinian Territory, Occupied</option>
<option value='PA' <?php if ($_REQUEST['billing_country'] == 'PA') echo "selected='selected'"; ?>>Panama</option>
<option value='PG' <?php if ($_REQUEST['billing_country'] == 'PG') echo "selected='selected'"; ?>>Papua New Guinea</option>
<option value='PY' <?php if ($_REQUEST['billing_country'] == 'PY') echo "selected='selected'"; ?>>Paraguay</option>
<option value='PE' <?php if ($_REQUEST['billing_country'] == 'PE') echo "selected='selected'"; ?>>Peru</option>
<option value='PH' <?php if ($_REQUEST['billing_country'] == 'PH') echo "selected='selected'"; ?>>Philippines</option>
<option value='PN' <?php if ($_REQUEST['billing_country'] == 'PN') echo "selected='selected'"; ?>>Pitcairn</option>
<option value='PL' <?php if ($_REQUEST['billing_country'] == 'PL') echo "selected='selected'"; ?>>Poland</option>
<option value='PT' <?php if ($_REQUEST['billing_country'] == 'PT') echo "selected='selected'"; ?>>Portugal</option>
<option value='PR' <?php if ($_REQUEST['billing_country'] == 'PR') echo "selected='selected'"; ?>>Puerto Rico</option>
<option value='QA' <?php if ($_REQUEST['billing_country'] == 'QA') echo "selected='selected'"; ?>>Qatar</option>
<option value='RE' <?php if ($_REQUEST['billing_country'] == 'RE') echo "selected='selected'"; ?>>Reunion</option>
<option value='RO' <?php if ($_REQUEST['billing_country'] == 'RO') echo "selected='selected'"; ?>>Romania</option>
<option value='RU' <?php if ($_REQUEST['billing_country'] == 'RU') echo "selected='selected'"; ?>>Russian Federation</option>
<option value='RW' <?php if ($_REQUEST['billing_country'] == 'RW') echo "selected='selected'"; ?>>Rwanda</option>
<option value='GS' <?php if ($_REQUEST['billing_country'] == 'GS') echo "selected='selected'"; ?>>S. Georgia and S. Sandwich Isls.</option>
<option value='KN' <?php if ($_REQUEST['billing_country'] == 'KN') echo "selected='selected'"; ?>>Saint Kitts and Nevis</option>
<option value='LC' <?php if ($_REQUEST['billing_country'] == 'LC') echo "selected='selected'"; ?>>Saint Lucia</option>
<option value='VC' <?php if ($_REQUEST['billing_country'] == 'VC') echo "selected='selected'"; ?>>Saint Vincent &amp; the Grenadines</option>
<option value='WS' <?php if ($_REQUEST['billing_country'] == 'WS') echo "selected='selected'"; ?>>Samoa</option>
<option value='SM' <?php if ($_REQUEST['billing_country'] == 'SM') echo "selected='selected'"; ?>>San Marino</option>
<option value='ST' <?php if ($_REQUEST['billing_country'] == 'ST') echo "selected='selected'"; ?>>Sao Tome and Principe</option>
<option value='SA' <?php if ($_REQUEST['billing_country'] == 'SA') echo "selected='selected'"; ?>>Saudi Arabia</option>
<option value='SN' <?php if ($_REQUEST['billing_country'] == 'SN') echo "selected='selected'"; ?>>Senegal</option>
<option value='RS' <?php if ($_REQUEST['billing_country'] == 'RS') echo "selected='selected'"; ?>>Serbia</option>
<option value='SC' <?php if ($_REQUEST['billing_country'] == 'SC') echo "selected='selected'"; ?>>Seychelles</option>
<option value='SL' <?php if ($_REQUEST['billing_country'] == 'SL') echo "selected='selected'"; ?>>Sierra Leone</option>
<option value='SG' <?php if ($_REQUEST['billing_country'] == 'SG') echo "selected='selected'"; ?>>Singapore</option>
<option value='SI' <?php if ($_REQUEST['billing_country'] == 'SI') echo "selected='selected'"; ?>>Slovenia</option>
<option value='SK' <?php if ($_REQUEST['billing_country'] == 'SK') echo "selected='selected'"; ?>>Slovak Republic</option>
<option value='SB' <?php if ($_REQUEST['billing_country'] == 'SB') echo "selected='selected'"; ?>>Solomon Islands</option>
<option value='SO' <?php if ($_REQUEST['billing_country'] == 'SO') echo "selected='selected'"; ?>>Somalia</option>
<option value='ZA' <?php if ($_REQUEST['billing_country'] == 'ZA') echo "selected='selected'"; ?>>South Africa</option>
<option value='GS' <?php if ($_REQUEST['billing_country'] == 'GS') echo "selected='selected'"; ?>>S. Georgia and S. Sandwich Isls.</option>
<option value='ES' <?php if ($_REQUEST['billing_country'] == 'ES') echo "selected='selected'"; ?>>Spain</option>
<option value='LK' <?php if ($_REQUEST['billing_country'] == 'LK') echo "selected='selected'"; ?>>Sri Lanka</option>
<option value='SH' <?php if ($_REQUEST['billing_country'] == 'SH') echo "selected='selected'"; ?>>St. Helena</option>
<option value='PM' <?php if ($_REQUEST['billing_country'] == 'PM') echo "selected='selected'"; ?>>St. Pierre and Miquelon</option>
<option value='SD' <?php if ($_REQUEST['billing_country'] == 'SD') echo "selected='selected'"; ?>>Sudan</option>
<option value='SR' <?php if ($_REQUEST['billing_country'] == 'SR') echo "selected='selected'"; ?>>Suriname</option>
<option value='SJ' <?php if ($_REQUEST['billing_country'] == 'SJ') echo "selected='selected'"; ?>>Svalbard &amp; Jan Mayen Islands</option>
<option value='SZ' <?php if ($_REQUEST['billing_country'] == 'SZ') echo "selected='selected'"; ?>>Swaziland</option>
<option value='SE' <?php if ($_REQUEST['billing_country'] == 'SE') echo "selected='selected'"; ?>>Sweden</option>
<option value='CH' <?php if ($_REQUEST['billing_country'] == 'CH') echo "selected='selected'"; ?>>Switzerland</option>
<option value='SY' <?php if ($_REQUEST['billing_country'] == 'SY') echo "selected='selected'"; ?>>Syria</option>
<option value='TW' <?php if ($_REQUEST['billing_country'] == 'TW') echo "selected='selected'"; ?>>Taiwan</option>
<option value='TJ' <?php if ($_REQUEST['billing_country'] == 'TJ') echo "selected='selected'"; ?>>Tajikistan</option>
<option value='TZ' <?php if ($_REQUEST['billing_country'] == 'TZ') echo "selected='selected'"; ?>>Tanzania</option>
<option value='TH' <?php if ($_REQUEST['billing_country'] == 'TH') echo "selected='selected'"; ?>>Thailand</option>
<option value='TG' <?php if ($_REQUEST['billing_country'] == 'TG') echo "selected='selected'"; ?>>Togo</option>
<option value='TK' <?php if ($_REQUEST['billing_country'] == 'TK') echo "selected='selected'"; ?>>Tokelau</option>
<option value='TO' <?php if ($_REQUEST['billing_country'] == 'TO') echo "selected='selected'"; ?>>Tonga</option>
<option value='TT' <?php if ($_REQUEST['billing_country'] == 'TT') echo "selected='selected'"; ?>>Trinidad and Tobago</option>
<option value='TN' <?php if ($_REQUEST['billing_country'] == 'TN') echo "selected='selected'"; ?>>Tunisia</option>
<option value='TR' <?php if ($_REQUEST['billing_country'] == 'TR') echo "selected='selected'"; ?>>Turkey</option>
<option value='TM' <?php if ($_REQUEST['billing_country'] == 'TM') echo "selected='selected'"; ?>>Turkmenistan</option>
<option value='TC' <?php if ($_REQUEST['billing_country'] == 'TC') echo "selected='selected'"; ?>>Turks and Caicos Islands</option>
<option value='TV' <?php if ($_REQUEST['billing_country'] == 'TV') echo "selected='selected'"; ?>>Tuvalu</option>
<option value='UG' <?php if ($_REQUEST['billing_country'] == 'UG') echo "selected='selected'"; ?>>Uganda</option>
<option value='UA' <?php if ($_REQUEST['billing_country'] == 'UA') echo "selected='selected'"; ?>>Ukraine</option>
<option value='AE' <?php if ($_REQUEST['billing_country'] == 'AE') echo "selected='selected'"; ?>>United Arab Emirates</option>
<option value='UK' <?php if ($_REQUEST['billing_country'] == 'UK') echo "selected='selected'"; ?>>United Kingdom</option>
<option value='UM' <?php if ($_REQUEST['billing_country'] == 'UM') echo "selected='selected'"; ?>>US Minor Outlying Islands</option>
<option value='UY' <?php if ($_REQUEST['billing_country'] == 'UY') echo "selected='selected'"; ?>>Uruguay</option>
<option value='UZ' <?php if ($_REQUEST['billing_country'] == 'UZ') echo "selected='selected'"; ?>>Uzbekistan</option>
<option value='VU' <?php if ($_REQUEST['billing_country'] == 'VU') echo "selected='selected'"; ?>>Vanuatu</option>
<option value='VA' <?php if ($_REQUEST['billing_country'] == 'VA') echo "selected='selected'"; ?>>Vatican City State (Holy See)</option>
<option value='VE' <?php if ($_REQUEST['billing_country'] == 'VE') echo "selected='selected'"; ?>>Venezuela</option>
<option value='VN' <?php if ($_REQUEST['billing_country'] == 'VN') echo "selected='selected'"; ?>>Vietnam</option>
<option value='VG' <?php if ($_REQUEST['billing_country'] == 'VG') echo "selected='selected'"; ?>>British Virgin Islands</option>
<option value='VI' <?php if ($_REQUEST['billing_country'] == 'VI') echo "selected='selected'"; ?>>Virgin Islands (U.S.)</option>
<option value='WF' <?php if ($_REQUEST['billing_country'] == 'WF') echo "selected='selected'"; ?>>Wallis and Futuna Islands</option>
<option value='EH' <?php if ($_REQUEST['billing_country'] == 'EH') echo "selected='selected'"; ?>>Western Sahara</option>
<option value='YE' <?php if ($_REQUEST['billing_country'] == 'YE') echo "selected='selected'"; ?>>Yemen</option>
<option value='ZM' <?php if ($_REQUEST['billing_country'] == 'ZM') echo "selected='selected'"; ?>>Zambia</option>
<option value='ZW' <?php if ($_REQUEST['billing_country'] == 'ZW') echo "selected='selected'"; ?>>Zimbabwe</option>
</select></div></td></tr>
<tr class='billing_address'><td class='label'><div class="<?php echo $errors[0][billing_address]; ?>">Address</div></td><td class='field'><div><input name='billing_address' type='text' value='<?php echo $_REQUEST['billing_address']; ?>'></div></td></tr>
<tr class='billing_city'><td class='label'><div class="<?php echo $errors[0][billing_city]; ?>">City</div></td><td class='field'><div><input name='billing_city' type='text' value='<?php echo $_REQUEST['billing_city']; ?>'></div></td></tr>
<tr class='billing_state'><td class='label'><div class="<?php echo $errors[0][billing_state]; ?>">State/Province</div></td><td class='field'><div><select name='billing_state'>
<option selected='1' value=''>[Pick One]</option>
<option value='AL' <?php if ($_REQUEST['billing_state'] == 'AL') echo "selected='selected'"; ?>>Alabama</option>
<option value='AK' <?php if ($_REQUEST['billing_state'] == 'AK') echo "selected='selected'"; ?>>Alaska</option>
<option value='AZ' <?php if ($_REQUEST['billing_state'] == 'AZ') echo "selected='selected'"; ?>>Arizona</option>
<option value='AR' <?php if ($_REQUEST['billing_state'] == 'AR') echo "selected='selected'"; ?>>Arkansas</option>
<option value='CA' <?php if ($_REQUEST['billing_state'] == 'CA') echo "selected='selected'"; ?>>California</option>
<option value='CO' <?php if ($_REQUEST['billing_state'] == 'CO') echo "selected='selected'"; ?>>Colorado</option>
<option value='CT' <?php if ($_REQUEST['billing_state'] == 'CT') echo "selected='selected'"; ?>>Connecticut</option>
<option value='DE' <?php if ($_REQUEST['billing_state'] == 'DE') echo "selected='selected'"; ?>>Delaware</option>
<option value='DC' <?php if ($_REQUEST['billing_state'] == 'DC') echo "selected='selected'"; ?>>District of Columbia</option>
<option value='FL' <?php if ($_REQUEST['billing_state'] == 'FL') echo "selected='selected'"; ?>>Florida</option>
<option value='GA' <?php if ($_REQUEST['billing_state'] == 'GA') echo "selected='selected'"; ?>>Georgia</option>
<option value='HI' <?php if ($_REQUEST['billing_state'] == 'HI') echo "selected='selected'"; ?>>Hawaii</option>
<option value='ID' <?php if ($_REQUEST['billing_state'] == 'ID') echo "selected='selected'"; ?>>Idaho</option>
<option value='IL' <?php if ($_REQUEST['billing_state'] == 'IL') echo "selected='selected'"; ?>>Illinois</option>
<option value='IN' <?php if ($_REQUEST['billing_state'] == 'IN') echo "selected='selected'"; ?>>Indiana</option>
<option value='IA' <?php if ($_REQUEST['billing_state'] == 'IA') echo "selected='selected'"; ?>>Iowa</option>
<option value='KS' <?php if ($_REQUEST['billing_state'] == 'KS') echo "selected='selected'"; ?>>Kansas</option>
<option value='KY' <?php if ($_REQUEST['billing_state'] == 'KY') echo "selected='selected'"; ?>>Kentucky</option>
<option value='LA' <?php if ($_REQUEST['billing_state'] == 'LA') echo "selected='selected'"; ?>>Louisiana</option>
<option value='ME' <?php if ($_REQUEST['billing_state'] == 'ME') echo "selected='selected'"; ?>>Maine</option>
<option value='MD' <?php if ($_REQUEST['billing_state'] == 'MD') echo "selected='selected'"; ?>>Maryland</option>
<option value='MA' <?php if ($_REQUEST['billing_state'] == 'MA') echo "selected='selected'"; ?>>Massachusetts</option>
<option value='MI' <?php if ($_REQUEST['billing_state'] == 'MI') echo "selected='selected'"; ?>>Michigan</option>
<option value='MN' <?php if ($_REQUEST['billing_state'] == 'MN') echo "selected='selected'"; ?>>Minnesota</option>
<option value='MS' <?php if ($_REQUEST['billing_state'] == 'MS') echo "selected='selected'"; ?>>Mississippi</option>
<option value='MO' <?php if ($_REQUEST['billing_state'] == 'MO') echo "selected='selected'"; ?>>Missouri</option>
<option value='MT' <?php if ($_REQUEST['billing_state'] == 'MT') echo "selected='selected'"; ?>>Montana</option>
<option value='NE' <?php if ($_REQUEST['billing_state'] == 'NE') echo "selected='selected'"; ?>>Nebraska</option>
<option value='NV' <?php if ($_REQUEST['billing_state'] == 'NV') echo "selected='selected'"; ?>>Nevada</option>
<option value='NH' <?php if ($_REQUEST['billing_state'] == 'NH') echo "selected='selected'"; ?>>New Hampshire</option>
<option value='NJ' <?php if ($_REQUEST['billing_state'] == 'NJ') echo "selected='selected'"; ?>>New Jersey</option>
<option value='NM' <?php if ($_REQUEST['billing_state'] == 'NM') echo "selected='selected'"; ?>>New Mexico</option>
<option value='NY' <?php if ($_REQUEST['billing_state'] == 'NY') echo "selected='selected'"; ?>>New York</option>
<option value='NC' <?php if ($_REQUEST['billing_state'] == 'NC') echo "selected='selected'"; ?>>North Carolina</option>
<option value='ND' <?php if ($_REQUEST['billing_state'] == 'ND') echo "selected='selected'"; ?>>North Dakota</option>
<option value='OH' <?php if ($_REQUEST['billing_state'] == 'OH') echo "selected='selected'"; ?>>Ohio</option>
<option value='OK' <?php if ($_REQUEST['billing_state'] == 'OK') echo "selected='selected'"; ?>>Oklahoma</option>
<option value='OR' <?php if ($_REQUEST['billing_state'] == 'OR') echo "selected='selected'"; ?>>Oregon</option>
<option value='PA' <?php if ($_REQUEST['billing_state'] == 'PA') echo "selected='selected'"; ?>>Pennsylvania</option>
<option value='RI' <?php if ($_REQUEST['billing_state'] == 'RI') echo "selected='selected'"; ?>>Rhode Island</option>
<option value='SC' <?php if ($_REQUEST['billing_state'] == 'SC') echo "selected='selected'"; ?>>South Carolina</option>
<option value='SD' <?php if ($_REQUEST['billing_state'] == 'SD') echo "selected='selected'"; ?>>South Dakota</option>
<option value='TN' <?php if ($_REQUEST['billing_state'] == 'TN') echo "selected='selected'"; ?>>Tennessee</option>
<option value='TX' <?php if ($_REQUEST['billing_state'] == 'TX') echo "selected='selected'"; ?>>Texas</option>
<option value='UT' <?php if ($_REQUEST['billing_state'] == 'UT') echo "selected='selected'"; ?>>Utah</option>
<option value='VT' <?php if ($_REQUEST['billing_state'] == 'VT') echo "selected='selected'"; ?>>Vermont</option>
<option value='VA' <?php if ($_REQUEST['billing_state'] == 'VA') echo "selected='selected'"; ?>>Virginia</option>
<option value='WA' <?php if ($_REQUEST['billing_state'] == 'WA') echo "selected='selected'"; ?>>Washington</option>
<option value='WV' <?php if ($_REQUEST['billing_state'] == 'WV') echo "selected='selected'"; ?>>West Virginia</option>
<option value='WI' <?php if ($_REQUEST['billing_state'] == 'WI') echo "selected='selected'"; ?>>Wisconsin</option>
<option value='WY' <?php if ($_REQUEST['billing_state'] == 'WY') echo "selected='selected'"; ?>>Wyoming</option>
<option value='ON' <?php if ($_REQUEST['billing_state'] == 'ON') echo "selected='selected'"; ?>>Ontario</option>
<option value='QC' <?php if ($_REQUEST['billing_state'] == 'QC') echo "selected='selected'"; ?>>Quebec</option>
<option value='NS' <?php if ($_REQUEST['billing_state'] == 'NS') echo "selected='selected'"; ?>>Nova Scotia</option>
<option value='NB' <?php if ($_REQUEST['billing_state'] == 'NB') echo "selected='selected'"; ?>>New Brunswick</option>
<option value='MB' <?php if ($_REQUEST['billing_state'] == 'MB') echo "selected='selected'"; ?>>Manitoba</option>
<option value='BC' <?php if ($_REQUEST['billing_state'] == 'BC') echo "selected='selected'"; ?>>British Columbia</option>
<option value='PE' <?php if ($_REQUEST['billing_state'] == 'PE') echo "selected='selected'"; ?>>Prince Edward Island</option>
<option value='SK' <?php if ($_REQUEST['billing_state'] == 'SK') echo "selected='selected'"; ?>>Saskatchewan</option>
<option value='AB' <?php if ($_REQUEST['billing_state'] == 'AB') echo "selected='selected'"; ?>>Alberta</option>
<option value='NL' <?php if ($_REQUEST['billing_state'] == 'NL') echo "selected='selected'"; ?>>Newfoundland/Labrador</option>
</select><input name='billing_state_other' type='text' value=''></div></td></tr>
<tr class='billing_zip'><td class='label'><div class="<?php echo $errors[0][billing_zip]; ?>">Zip</div></td><td class='field'><div><input name='billing_zip' type='text' value='<?php echo $_REQUEST['billing_zip']; ?>'></div></td></tr>
<tr class='_card_info'><td class='section' colspan='2'><div>Credit Card Info</div></td></tr>
<tr class='card_number'><td class='label'><div class="<?php echo $errors[0][card_number]; ?>">Credit Card Number</div></td><td class='field'><div><input autocomplete='off' name='card_number' type='text' value='<?php echo $_REQUEST['card_number']; ?>'></div></td></tr>
<tr class='security_code'><td class='label'><div class="<?php echo $errors[0][security_code]; ?>">Security Code</div></td><td class='field'><div><input autocomplete='off' name='security_code' type='text' value='<?php echo $_REQUEST['security_code']; ?>'></div></td></tr>
<tr class='expiration'><td class='label'><div class="<?php echo $errors[0][expiration_month]; ?> <?php echo $errors[0][expiration_year]; ?>">Credit Card Expiration</div></td><td class='field'><div>
<select name='expiration_month'>
<option value='01' <?php if ($_SESSION['expiration_month'] == '1'): ?>selected<?php endif ?>>1</option>
<option value='02' <?php if ($_SESSION['expiration_month'] == '2'): ?>selected<?php endif ?>>2</option>
<option value='03' <?php if ($_SESSION['expiration_month'] == '3'): ?>selected<?php endif ?>>3</option>
<option value='04' <?php if ($_SESSION['expiration_month'] == '4'): ?>selected<?php endif ?>>4</option>
<option value='05' <?php if ($_SESSION['expiration_month'] == '5'): ?>selected<?php endif ?>>5</option>
<option value='06' <?php if ($_SESSION['expiration_month'] == '6'): ?>selected<?php endif ?>>6</option>
<option value='07' <?php if ($_SESSION['expiration_month'] == '7'): ?>selected<?php endif ?>>7</option>
<option value='08' <?php if ($_SESSION['expiration_month'] == '8'): ?>selected<?php endif ?>>8</option>
<option value='09' <?php if ($_SESSION['expiration_month'] == '9'): ?>selected<?php endif ?>>9</option>
<option value='10' <?php if ($_SESSION['expiration_month'] == '10'): ?>selected<?php endif ?>>10</option>
<option value='11' <?php if ($_SESSION['expiration_month'] == '11'): ?>selected<?php endif ?>>11</option>
<option value='12' <?php if ($_SESSION['expiration_month'] == '12'): ?>selected<?php endif ?>>12</option>
</select>&nbsp;<select name='expiration_year'>
<?php for ($year = date('Y'); $year <= date('Y') + 10; $year++): ?>
<option value='<?php echo $year; ?>' <?php if ($_SESSION['expiration_year'] == $year): ?>selected<?php endif ?>><?php echo $year; ?></option>
<?php endfor; ?>
</select></div></td></tr>
				</table><div class='form_content'></div></div>
				<p style="text-align:center"><img src="images/accepted_cards.png"></p>
				<p style="text-align:center">
					<button type="submit" id="sub_btn">Pay Now</button>
				</p>
				<?php if ($bill == 'trial'): ?>
				<center>Your card will be billed $<?php echo $billed; ?> at the end of the trial period</center>
				<?php else: ?>
				<center>Your card will be billed <?php echo $bill; ?> for $<?php echo $billed; ?></center>
				<?php endif ?>
				<input type="hidden" name="p" value="<?php echo $p; ?>" />
				<input type="hidden" name="existingSubscriber" value="<?php echo $existingSubscriberID; ?>" />
				</form>
			</div>
			<div id="sidebox">
				<div class="orderform-tbl-section-fields">
					<div class="paymentTitle2">Secure <b>Payments</b></div>
					<div style="display: block;" class="orderform-seals">
						<center>
							<div class="AuthorizeNetSeal" style="padding: 5px; margin-top: 5px;" align="left">
							
    <!-- Do not alter for the seal to work properly -->
    <div id="sslsSiteSeal">
        <img src="images/seal.gif" style="margin-left: -4px"/>
    </div>
							</div>
						</center>
						<div id="vbvmcs"></div>
	
					</div>
				</div>
			</div>
			<p style="clear: both"></p>
		</div>
		<div id="footer"> </div>
	</div>
	<div id="authFooter">
			<p class="terms">

</p><br/>

		<div> </div>
	</div>
</div>


</body>
</html>
<?php } ?>
<?php

function processPayment() {
	global $bill;
	if ($bill == 'once') $result = processSinglePayment();
	if ($bill == 'monthly') $result = processMonthlyPayment();
	if ($bill == 'trial') $result = processTrialPayment();
	return $result;
}

function processSinglePayment() {
	global $price;
	global $pname;
	global $quantity;
	global $site;
	global $phone;
	global $address;
	global $email;
	global $city;
	global $state;
	global $country;
	global $zip;
	global $firstname;
	global $lastname;
	include 'inc/gwapi.php';
	$gw = new gwapi;
	if ($_SERVER['REMOTE_ADDR'] == '96.32.9.1821' || $_SERVER['REMOTE_ADDR'] == '74.121.34.54') {
	$gw->setLogin("demo", "password");
	} else {
	$gw->setLogin("JamiesMarketing1101", "Golapo123!");
	}

	$ccexp = $_POST['expiration_month'] . $_POST['expiration_year'];
	$cardtype = $_POST['card_type'];
	$ccnumber = $_POST['card_number'];
	$cvv = $_POST['cvv'];
	$amount = $price;
	$gw->setBilling($firstname, $lastname, "", $address, "", $city, $state, $zip, $country, $phone, "", $email, "");
	$gw->setShipping($firstname, $lastname, "", $address, "", $city, $state, $zip, $country, $email);
	$ip = $_SERVER['REMOTE_ADDR'];
	if ($_COOKIE['jv'] == 'true') {
		$gw->setOrder('TLGMRYAN' . uniqid(),$pname,1, 2, 'TLGMRYAN' . uniqid(),$ip);
	} else {
		$gw->setOrder('TLGM' . uniqid(),$pname,1, 2, 'TLGM' . uniqid(),$ip);
	}	
	$r = $gw->doSale($amount, $ccnumber, $ccexp, $cvv);
	$response = $gw->responses['response'];
	if ($response == 1) {
		$transactionId = $gw->responses['transactionid'];
		purchaseComplete(null,$transactionId,$quantity);
		return false;
	} else {
		return array($gw->responses['responsetext']);		
	}
}

function processTrialPayment() {
	global $price;
	global $rebillprice;
	global $pname;
	global $quantity;
	global $site;
	global $phone;
	global $address;
	global $email;
	global $city;
	global $state;
	global $country;
	global $zip;
	global $firstname;
	global $lastname;
	include 'inc/gwapi.php';
	$gw = new gwapi;
	if ($_SERVER['REMOTE_ADDR'] == '96.32.9.1821' || $_SERVER['REMOTE_ADDR'] == '174.1.9.381') {
	$gw->setLogin("demo", "password");
	} else {
	$gw->setLogin("JamiesMarketing1101", "Golapo123!");
	}
	$ccexp = $_POST['expiration_month'] . $_POST['expiration_year'];
	$cardtype = $_POST['card_type'];
	$ccnumber = $_POST['card_number'];
	$cvv = $_POST['cvv'];
	$amount = $price;
	$gw->setBilling($firstname, $lastname, "", $address, "", $city, $state, $zip, $country, $phone, "", $email, "");
	$gw->setShipping($firstname, $lastname, "", $address, "", $city, $state, $zip, $country, $email);
	$ip = $_SERVER['REMOTE_ADDR'];
	$gw->setOrder('DELITE' . uniqid(),$pname,1, 2, 'DELITE' . uniqid(),$ip);
	$r = $gw->doTrial($amount, $rebillprice, 1, 7, $ccnumber, $ccexp, $cvv);
	$response = $gw->responses['response'];
	if ($response == 1) {
		$transactionId = $gw->responses['transactionid'];
		purchaseComplete(null,$transactionId,$quantity);
		return false;
	} else {
		return array($gw->responses['responsetext']);		
	}
}





function errors() {
	$messages = array();
	$missing = array();
	$required = array('first_name',
					  'last_name',
					  'primary_phone',
					  'email',
					  'email_again',
					  'billing_country',
					  'billing_address',					  
					  'billing_city',
					  'billing_zip',
					  'card_number',
					  'security_code',
					  'expiration_month',
					  'expiration_year',
					  'security_code'
					  );
	if ($_POST['billing_country'] == 'US' or $_POST['billing_country'] == 'CA') { 
		array_push($required, 'billing_state');
	} else {
		array_push($required, 'billing_state_other');
	}
	
	foreach ($required as $name) {
		if (empty($_POST[$name])) {
			$missing[$name] = 'missing';
		}
	}
	
	if ($missing) {
		$messages[] = "Complete the missing fields highlighted below.";
	} else {
		if ($_POST['email'] != $_POST['email_again']) {
			$messages[] = "Email and Re-Type Email values do not match.";
			$missing['email'] = 'missing';
			$missing['email_again'] = 'missing';
		}
		if (!preg_match('/@/',$_POST['email'])) {
			$messages[] = "Please provide a valid email address.";
			$missing['email'] = 'missing';
			$missing['email_again'] = 'missing';
		}
	}		
	
	if ($missing or $messages) {
		return array($missing, $messages);
	} else {
		return false;
	}	
}

function purchaseComplete($subscriberId,$transactionID,$quantity) {
	global $returnurl;
	global $quantity;
	global $pname;
	global $item;
	global $price;
	global $campaign;
	global $phone;
	global $firstname;
	global $lastname;
	global $email;
	global $address;
	global $city;
	global $state;
	global $country;
	global $zip;
	
	$key = base64_encode(time());

	$firstname = $_REQUEST['first_name'];
	$lastname = $_REQUEST['last_name'];
	
	//$name = $_REQUEST['first_name'] . '+' . $_REQUEST['last_name'];
	//$email = $_REQUEST['email'];
	
	$name = $firstname . '+' . $lastname;
	$string = array();
	array_push($string, "orderid=$transactionID");
	array_push($string, "fname=$firstname");
	array_push($string, "customeremail=$email");
	array_push($string, "phone=$phone");
	$returnurl .= '?' . implode('&',$string);
	if ($_SERVER['REMOTE_ADDR'] == '174.1.9.39') {
		echo $firstname;
		echo $lastname;
		echo $email;
		echo $item;
		exit;
	}
	//include 'provision.php';
	//include '../ft-nonce/ft-nonce-lib.php';	
	//$nonce = ft_nonce_create_query_string( 'thelastgoldmineorder' );
	header("Location: $returnurl" . "&" . $nonce);
	exit;
}	

?>
