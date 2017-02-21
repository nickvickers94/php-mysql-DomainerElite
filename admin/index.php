<?php 

    require_once("includes/conn.php");

    if ($_POST["pressed"] == "2") {
        $field = $_POST["fieldname"];
        $sql = "ALTER TABLE `domainer_elite`.`domains` ADD COLUMN `$field` TEXT NOT NULL";
        $conn->query($sql);
    }
    elseif ($_POST["pressed"] == "1") {

        $keys = array_keys($_POST);

        $keywords = array();

        foreach ($keys as $key) {
            if ($key != "pressed") {
                if ($key == "expired_domains") {
                    $expired_domains = str_replace("\r\n", ",", str_replace(" ", "", trim($_POST["expired_domains"])));
                    $expired_domains_array = explode(",", $expired_domains);
                }
                elseif ($key == "jamies_domains") {
                    $jamies_domains = str_replace("\r\n", ",", str_replace(" ", "", trim($_POST["jamies_domains"])));
                    $jamies_domains_array = explode(",", $jamies_domains);
                }
                elseif ($key == "dictionary_domains") {
                    $dictionary_domains = str_replace("\r\n", ",", str_replace(" ", "", trim($_POST["dictionary_domains"])));
                    $dictionary_domains_array = explode(",", $dictionary_domains);
                }
                else {
                    $keywords[$key] = $_POST[$key];
                }
            }
        }

    	$result = $conn->query("SELECT * FROM domains LIMIT 1");

    	if($result->num_rows > 0) {
    		$row = $result->fetch_array(MYSQLI_BOTH);
    		$id = $row["id"];

            $query = "UPDATE `domainer_elite`.`domains` SET ";
            
            foreach ($keywords as $key => $value) {
                $query .= '`' .$key. "` = '" .$value. "', ";
            }

            $query .= "`date` = NOW() WHERE `domains`.`id` = $id";
    		$conn->query($query);

    		// $result = $conn->query("SELECT domain FROM expired_domains");
    		// while (list($domain) = mysqli_fetch_array($result)) {
    		// 	if (!in_array($domain, $expired_domains_array)) {
    		// 		$conn->query("DELETE FROM expired_domains WHERE domain='$domain'");
    		// 	}
    		// }
    		foreach ($expired_domains_array as $domain) {
                $conn->query("DELETE FROM expired_domains WHERE domain='$domain'");
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
    	}
    }
    else {
        $sql = "DESCRIBE domains";
        $result = $conn->query($sql);

        $fields = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if ($row["Field"] != "id" && $row["Field"] != "date") {
                    array_push($fields, $row["Field"]);
                }
            }
        }

    	$result = $conn->query("SELECT * FROM domains LIMIT 1");
    	if($result->num_rows > 0){
    		$row = $result->fetch_array(MYSQLI_BOTH);
    	}
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

        <link rel="stylesheet" href="css/style.css">
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link rel="stylesheet" href="css/jquery.fileupload.css">

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Tags Input -->
        <link href="bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">

        <style>
            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 30%;
            }

            /* The Close Button */
            .close {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

            div.upload {
                width: 157px;
                height: 57px;
                background: url(https://lh6.googleusercontent.com/-dqTIJRTqEAQ/UJaofTQm3hI/AAAAAAAABHo/w7ruR1SOIsA/s157/upload.png);
                overflow: hidden;
            }

            div.upload input {
                display: block !important;
                width: 157px !important;
                height: 57px !important;
                opacity: 0 !important;
                overflow: hidden !important;
            }
        </style>


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
                            <h1 class="page-header">Dashboard
                                <small>Manage domains</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>
                                    <a href="index.php">Dashboard</a>
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

                            <form id = "lists" role="form">
    							<p><strong>Note:</strong> <span style="color:red;">Press Enter Key to insert a Keyword.</span></p><br>

                                <?php
                                    $result = $conn->query("SELECT domain FROM expired_domains");
                                    $expired_domains_array = array();

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row1 = $result->fetch_assoc()) {
                                            array_push($expired_domains_array, $row1["domain"]);
                                        }
                                    }

                                    $expired_domains = "";
                                    foreach ($expired_domains_array as $expired_domain) {
                                        $expired_domains .= $expired_domain."\n";
                                    }
                                    $expired_domains = trim($expired_domains);
                                ?>
                                <div class="form-group">
                                    <label>Expired Domains</label>
                                    <textarea id="expired_domains" class="form-control"  rows="10"> <?php echo($expired_domains); ?> </textarea>
                                </div>

                                <div class="row">
                                    <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Select files...</span>
                                        <!-- The file input field used as target for the file upload widget -->
                                        <input id="fileupload" type="file" name="files[]" multiple>
                                    </span>

                                    <span class="text-success" id="upload_msg"></span>
                                </div>
                                
                                <br>
                                <br>
                                <!-- The global progress bar -->
                                <div id="progress" class="progress">
                                    <div class="progress-bar progress-bar-success"></div>
                                </div>
                                <!-- The container for the uploaded files -->
                                <div id="files" class="files"></div>
                                <br>

                                <?php
                                    $result = $conn->query("SELECT domain FROM jamies_domains");
                                    $jamies_domains_array = array();

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row2 = $result->fetch_assoc()) {
                                            array_push($jamies_domains_array, $row2["domain"]);
                                        }
                                    }

                                    $jamies_domains = "";
                                    foreach ($jamies_domains_array as $jamies_domain) {
                                        $jamies_domains .= $jamies_domain."\n";
                                    }
                                    $jamies_domains = trim($jamies_domains);
                                ?>
                                <div class="form-group">
                                    <label>Jamie's Domains</label>
                                    <textarea id="jamies_domains" class="form-control"  rows="10"> <?php echo($jamies_domains); ?> </textarea>
                                </div>

                                <?php
                                    $result = $conn->query("SELECT domain FROM dictionary_domains");
                                    $dictionary_domains_array = array();

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row3 = $result->fetch_assoc()) {
                                            array_push($dictionary_domains_array, $row3["domain"]);
                                        }
                                    }

                                    $dictionary_domains = "";
                                    foreach ($dictionary_domains_array as $dictionary_domain) {
                                        $dictionary_domains .= $dictionary_domain."\n";
                                    }
                                    $dictionary_domains = trim($dictionary_domains);
                                ?>
                                <div class="form-group">
                                    <label>Dictionary Domains</label>
                                    <textarea id="dictionary_domains" class="form-control"  rows="10"> <?php echo($dictionary_domains); ?> </textarea>
                                </div>
                                
                                <?php foreach ($fields as $field): ?>
                                    <div class="form-group">
                                        <label> <?php echo(str_replace("_", " ", $field)); ?> </label>
                                        <input class="form-control" data-role="tagsinput" id="<? echo($field); ?>"
                                        <?php if(is_array($row)): ?>
                                            value="<?php echo($row[$field]); ?>"
                                        <?php endif; ?> />
                                    </div>
                                <?php endforeach; ?>

                            </form>

                            <button type="submit" id="submit" class="btn btn-success">Save Changes</button>
                            <span class="text-success" id="sucess_msg"></span>

                            <a id="addlist" class="btn btn-success">Add list</a>

                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                List name: <input type="text" id="listname" placeholder="for example : Nouns"><br>
                <a id="addsubmit" class="btn btn-success">Add</a>
            </div>
        </div>
                    
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    	<script type="text/javascript" src="bootstrap-tagsinput/bootstrap-tagsinput-angular.min.js"></script>
        
        <script>
    		$(document).ready(function() {
            	$('#submit').on("click", function(e) {
    				e.preventDefault();
    				$('#sucess_msg').html('<font  style="color:#FF0000; font-weight:bold;">Please Wait...</font>');
    			    var data=new FormData();

                    $.ajax({
                        url: "get_fields.php",
                        type: "POST"
                    }).done(function(msg) {
                        var fields = JSON.parse(msg);
                        for (var i = fields.length - 1; i >= 0; i--) {
                            var field = fields[i];
                            data.append(field, $("#" + field).val().replace(/ /g,''));
                            data.append('pressed', "1");
                        }
                        data.append("expired_domains", $("#expired_domains").val().replace(/ /g,''));
                        data.append("jamies_domains", $("#jamies_domains").val().replace(/ /g,''));
                        data.append("dictionary_domains", $("#dictionary_domains").val().replace(/ /g,''));
                        $.ajax({
                            url:'index.php',
                            type:'POST',
                            processData: false,
                            contentType: false,
                            data: data,
                            success: function(resp) {
                                $("#excel_file").val('');
                                $('#sucess_msg').html('Your data has been saved Succesfully.');
                            }
                        });
                    });
    			});

                $("#file").change(function(){
                    $("#upload").submit();
                });
         	});
        </script>

        <script>
            // Get the modal
            var modal = document.getElementById('myModal');
            // Get the button that opens the modal
            var btn = document.getElementById("addlist");
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            var addsubmit = document.getElementById("addsubmit");

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }
            // When the user clicks on <span> (x), close the modal

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            addsubmit.onclick = function() {
                modal.style.display = "none";
                var listname = $("#listname").val();
                if (listname != "")
                {
                    $("#lists").append('<div class="form-group"><label>' + listname + '</label><input class="form-control" data-role="tagsinput" id="' + listname.replace(/ /g,'_') + '"><p class="help-block">i.e domainerelite.com</p></div>');

                    $(function() {
                        $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
                    });

                    var data = new FormData();
                    data.append('fieldname', listname.replace(/ /g, '_'));
                    data.append('pressed', "2");
                    $.ajax({
                        url:'index.php',
                        type:'POST',
                        processData: false,
                        contentType: false,
                        data:data,
                        success:function(resp){
                        }
                    });
                }
                else {
                    window.alert("This field must be not empty. Try again.");
                }
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

        <script src="js/vendor/jquery.ui.widget.js"></script>
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <script src="js/jquery.iframe-transport.js"></script>
        <!-- The basic File Upload plugin -->
        <script src="js/jquery.fileupload.js"></script>

        <script>
            /*jslint unparam: true */
            /*global window, $ */
            $(function () {
                'use strict';
                // Change this to the location of your server-side upload handler:
                var url = 'upload.php';
                $('#fileupload').fileupload({
                    url: url,
                    dataType: 'json',
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            $('<p/>').text(file.name).appendTo('#files');
                            $.ajax({
                                url: "expired_domain.php",
                                type: "POST",
                                data: {
                                    "csv" : file.name
                                }
                            }).done(function(msg) {
                                $('#expired_domains').val(msg);
                                $('#upload_msg').html('Expired domin uploaded');
                            });
                        });
                    },
                    progressall: function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress .progress-bar').css(
                            'width',
                            progress + '%'
                        );
                        $('#upload_msg').html('<font  style="color:#FF0000; font-weight:bold;">Please Wait...</font>');
                    },
                    success:function(resp){
                    }
                }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
            });
        </script>
    </body>

</html>
