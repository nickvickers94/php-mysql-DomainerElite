<?php
	require_once("includes/conn.php");

	$sql = "SELECT id, user_id, domain, listingdate, description, votes, type, price, link, category FROM marketplace_domains ORDER BY votes DESC";

	$result = $conn->query($sql);

	while (list($id, $user_id, $domain, $listingdate, $description, $votes, $type, $price, $link, $category) = mysqli_fetch_array($result)) {

		$sql = "SELECT count(*) FROM marketplace_domains_likes WHERE domain_id='$id' AND user_id='{$_SESSION['id']}'";
		$lresult = $conn->query($sql);
		list($count) = mysqli_fetch_array($lresult);

		$button = '<a href="marketplace-profile.php?id='.$user_id.'" class="btn vd_btn vd_bg-green btn-xs"><i class="fa fa-user"></i> View Seller</a> <a href="'.$link.'" target="_blank" class="btn vd_btn vd_bg-blue btn-xs"><i class="fa fa-shopping-cart"></i> View Listing</a> <button id="like_'.$id.'" onclick="vote('.$id.');" class="btn vd_btn vd_bg-red btn-xs';
		if ($count > 0)
			$button .= " disabled";
		$button .= '"><i class="fa fa-thumbs-up"></i> Like</button>';

		$domain = array($domain, $description, $listingdate, $votes, $type, $category, $price, $button);
		$data[] = $domain;
	}
	$value['data'] = $data;
	echo(json_encode($value));
?>