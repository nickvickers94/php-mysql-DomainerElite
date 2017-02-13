<?php 
require_once("includes/conn.php");

/* Get Field names of domain table */

$sql = "DESCRIBE domains";
$result = $conn->query($sql);

$fields = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($fields, $row["Field"]);
    }
} else {
    echo "0 results";
}


$row = "";
if(isset($_POST["pressed"])){
	$expired_domains = str_replace("\n",",",$_POST["expired_domains"]);
	$expired_domains_array1 = explode(",",$expired_domains);
	foreach ($expired_domains_array1 as $domain) {
		$expired_domains_array[] = trim($domain);
	}
	$jamies_domains = str_replace("\n",",",$_POST["jamies_domains"]);
	$jamies_domains_array1 = explode(",",$jamies_domains);
	foreach ($jamies_domains_array1 as $domain) {
		$jamies_domains_array[] = trim($domain);
	}
	$dictionary_domains = str_replace("\n",",",$_POST["dictionary_domains"]);
	$dictionary_domains_array1 = explode(",",$dictionary_domains);
	foreach ($dictionary_domains_array1 as $domain) {
		$dictionary_domains_array[] = trim($domain);
	}
	$domains_keys = $_POST["domain_keys"];
	$start_keys = $_POST["start_keys"];
	$end_keys = $_POST["end_keys"];
	$extentions = $_POST["extentions"];
    $nouns = $_POST["nouns"];
    $verbs = $_POST["verbs"];
    $places = $_POST["places"];
	
	$result = $conn->query("SELECT * FROM domains LIMIT 1");
	if($result->num_rows>0){
		$row = $result->fetch_array(MYSQLI_BOTH);
		$id = $row["id"];
		$conn->query("UPDATE `domainer_elite`.`domains` SET `expired_domains`='$expired_domains', `jamies_domains`='$jamies_domains', `dictionary_domains`='$dictionary_domains', `domains_keywords` = '$domains_keys', `start_keywords` = '$start_keys', `end_keywords` = '$end_keys', `extentions` = '$extentions', `nouns` = '$nouns', `verbs` = '$verbs', `places` = '$places', `date` = NOW() WHERE `domains`.`id` = $id");
		$result = $conn->query("SELECT domain FROM expired_domains");
		while (list($domain) = mysqli_fetch_array($result)) {
			if (!in_array($domain, $expired_domains_array)) {
				$conn->query("DELETE FROM expired_domains WHERE domain='$domain'");
			}
		}
		foreach ($expired_domains_array as $domain) {
			$conn->query("INSERT INTO expired_domains SET domain='$domain'");
		}
		
		$result = $conn->query("SELECT domain FROM jamies_domains");
		while (list($domain) = mysqli_fetch_array($result)) {
			if (!in_array($domain, $jamies_domains_array)) {
				$conn->query("DELETE FROM jamies_domains WHERE domain='$domain'");
			}
		}
		foreach ($jamies_domains_array as $domain) {
			$conn->query("INSERT INTO jamies_domains SET domain='$domain'");
		}
		
		$result = $conn->query("SELECT domain FROM dictionary_domains");
		while (list($domain) = mysqli_fetch_array($result)) {
			if (!in_array($domain, $dictionary_domains_array)) {
				$conn->query("DELETE FROM dictionary_domains WHERE domain='$domain'");
			}
		}
		foreach ($dictionary_domains_array as $domain) {
			$conn->query("INSERT INTO dictionary_domains SET domain='$domain'");
		}
		
	
	
	
	
	
	}else{
		$conn->query("INSERT INTO `domains` (`id`, `expired_domains`,`domains_keywords`,`jamies_domains`='$jamies_domains', `domainer_elite`.`dictionary_domains`='$dictionary_domains',`start_keywords`, `end_keywords`, `extentions`, `nouns`, `verbs`, `places`, `date`) VALUES (NULL, '$expired_domains', '$domains_keys', '$start_keys', '$end_keys', '$extentions', '$nouns', '$verbs', '$places', NOW())");
	}
	
	/*if(!empty($_FILES["file"]["tmp_name"])){
		
		$base_dir = "uploads/"; //a directory inside
		
		$dog_photo = $_FILES["file"]["name"]; //uploadImage('file', $base_dir,$imagenametoCreatethumb);
		
		$tmp_name = $_FILES["file"]["tmp_name"];
		
		if(file_exists($base_dir.$dog_photo)){
		
			$photo = explode(".",$dog_photo);
		
			$ext = pathinfo($dog_photo, PATHINFO_EXTENSION);
		
			$dog_photo = $photo[0].rand().".".$ext;
		
		
		
		}
		
		move_uploaded_file($tmp_name, $base_dir.$dog_photo);
		
		echo $base_dir.$dog_photo;
		
		
		
			if(isset($_COOKIE["user_id"]) && !empty($_COOKIE["user_id"])){
		
				$userid = $_COOKIE["user_id"];
		
				$conn->query("UPDATE  `tayler_vocalviews`.`vocal_consumers` SET  `pic` =  '$dog_photo' WHERE  `vocal_consumers`.`id` ='$userid'");
		
			}else{
		
				echo "Please login!";
		
			}
		
		
		
		}*/
	
	
}else{
	$result = $conn->query("SELECT * FROM domains LIMIT 1");
	if($result->num_rows>0){
		$row = $result->fetch_array(MYSQLI_BOTH);
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-Domainer Elite</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Tags Input -->
    <link href="bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">
    
    
    


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Domainer-Elite Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small>Manage domains</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Dashboard
                            </li>
                        </ol>      
                        
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-12">

                        <form role="form">
							<p><strong>Note:</strong> <span style="color:red;">Press Enter Key to insert a Keyword.</span></p><br>

							<?php
							foreach ($fields as $field) {
								if ($field != "id" && $field != "date") {
									?>
									<div class="form-group">
										<label>Enter <? echo($field) ?></label>
										<? if ($field == "expired_domains" || $field == "jamies_domains" || $field == "dictionary_domains" ) { ?>
										<textarea id="<? echo($field) ?>" class="form-control"  rows="10"><?php if(is_array($row)): ?><?=str_replace(',',"",str_replace(' ',"",$row[$field]));?><?php endif ?></textarea>
										<? } else { ?>
										<input class="form-control" data-role="tagsinput" id="<? echo($field) ?>" <?php if(is_array($row)){ ?> value="<?=$row[$field]?>" <?php } ?> >
										<? } ?>
										<p class="help-block">i.e domainerelite.com</p>
									</div>
									<?
								}
							}
							?>

                            <button type="submit" id="submit" class="btn btn-success">Save Changes</button> <span class="text-success" id="sucess_msg"></span>
                            

                        </form>

                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
	<script type="text/javascript" src="bootstrap-tagsinput/bootstrap-tagsinput-angular.min.js"></script>
    
    <script>
    	var interval;
		$(document).ready(function() {
			
				/*$("input").on("drop",function(){
					$(this).closest(".bootstrap-tagsinput").trigger("dbclick");
					
				});
*/			
        	
        	$('#submit').on("click",function(e) {
				e.preventDefault();
				 $('#sucess_msg').html('<font  style="color:#FF0000; font-weight:bold;">Please Wait...</font>');
					 var data=new FormData();
					 //data.append('file',$("#excel_file")[0].files[0]);
					 <?php
                     foreach ($fields as $index => $field) { 
                        if ($field != "id" && $field != "date") {?>
                        data.append('<? echo($field)?>', $("#<? echo($field)?>").val());
                     <?
                     }
                    }
                     ?>
					 data.append('pressed', "1");
					 
					 $.ajax({
						 url:'index.php',
						 type:'POST',
						 processData: false,
						 contentType: false,
						 data:data,
						 success:function(resp){
							 
							 $("#excel_file").val('');
							 $('#sucess_msg').html('Your data has been saved Succesfully.');
						 }
					 });
				});
         	});
    
    </script>

</body>

</html>
<?php } ?>
