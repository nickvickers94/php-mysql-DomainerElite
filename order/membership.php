<?php
$data = array();	
$data['site'] = "domainerelite.com";
$data['heading'] = "Domainer Elite";
$data['pname'] = "Membership";
$data['pdesc'] = "Domainer Elite Membership";
$data['price'] = "497.00";
$data['bill'] = "once";
//$data['exitURL'] = "http://www.thelastgoldmine.com/order/membership-discount.php";
$data['returnURL'] = "http://www.domainerelite.com/ithankyou46375.html";
$data['item'] = "membership";
//$data['subname'] = $_GET['name'];
//$data['subemail'] = $_GET['email'];
$query = base64_encode(http_build_query($data));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="refresh" content="0; url=https://www.domainerelite.com/order/index.php?p=<?php echo $query; ?>">
</head>
<body>
</body>
</html>
