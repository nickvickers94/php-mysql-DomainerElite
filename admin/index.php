<?php

	require_once("includes/conn.php");

	$sql = "SELECT list_name, keywords FROM lists WHERE 1";
	$result = $conn->query($sql);

	while (list($list_name, $keywords) = mysqli_fetch_array($result)) {
		$lists[$list_name] = $keywords;
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

		<link rel="stylesheet" type="text/css" href="jquery-tagsinput/jquery.tagsinput.css" />
		<!-- <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" /> -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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

									while (list($expired_domain) = mysqli_fetch_array($result)) {
										$arr_expired_domains[] = $expired_domain;
									}

                                    $expired_domains = "";
                                    foreach ($arr_expired_domains as $expired_domain) {
                                        $expired_domains .= $expired_domain."\n";
                                    }
                                    $expired_domains = trim(strtolower($expired_domains));
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

									while (list($jamies_domain) = mysqli_fetch_array($result)) {
										$arr_jamies_domains[] = $jamies_domain;
									}

                                    $jamies_domains = "";
                                    foreach ($arr_jamies_domains as $jamies_domain) {
                                        $jamies_domains .= $jamies_domain."\n";
                                    }
                                    $jamies_domains = trim(strtolower($jamies_domains));
                                ?>
                                <div class="form-group">
                                    <label>Jamie's Domains</label>
                                    <textarea id="jamies_domains" class="form-control"  rows="10"> <?php echo($jamies_domains); ?> </textarea>
                                </div>

                                <?php
                                    $result = $conn->query("SELECT domain FROM dictionary_domains");
                                    
                                    while (list($dictionary_domain) = mysqli_fetch_array($result)) {
										$arr_dictionary_domains[] = $dictionary_domain;
									}

                                    $dictionary_domains = "";
                                    foreach ($arr_dictionary_domains as $dictionary_domain) {
                                        $dictionary_domains .= $dictionary_domain."\n";
                                    }
                                    $dictionary_domains = trim(strtolower($dictionary_domains));
                                ?>
                                <div class="form-group">
                                    <label>Dictionary Domains</label>
                                    <textarea id="dictionary_domains" class="form-control"  rows="10"> <?php echo($dictionary_domains); ?> </textarea>
                                </div>
                                
								<?php foreach ($lists as $list_name => $keywords): ?>
									<div class="form-group">

										<p>
											<label> <?php echo(str_replace("_", " ", $list_name)); ?> </label>

											<label list = "<? echo($list_name); ?>" class="edit_list ui-button ui-widget ui-corner-all ui-button-icon-only" title="Edit name of this list">
												<span class="ui-icon ui-icon-pencil"></span>Edit
											</label>

											<label list = "<? echo($list_name); ?>" class="delete_list ui-button ui-widget ui-corner-all ui-button-icon-only" title="Delete this list">
												<span class="ui-icon ui-icon-trash"></span>Delete
											</label>

											<input id="<? echo($list_name); ?>" type="text" class="tags" value="<?php echo($keywords); ?>" />
										</p>

									</div>
								<?php endforeach; ?>

                            </form>

                            <button id="save_changes" class="btn btn-success">Save Changes</button>
                            <button id="add_list" class="btn btn-success">Add list</button>

                            <span class="text-success" id="success_msg"></span>

                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

		<div id="add_list_modal" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<span id="add_list_close" class="close">&times;</span>
				List name: <input type="text" id="add_list_name" placeholder="for example : Nouns"><br>
				<button id="add_list_submit" class="btn btn-success">Add</button>
			</div>
		</div>

		<div id="edit_list_modal" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<span id="edit_list_close" class="close">&times;</span>
				List name: <input type="text" id="edit_list_name" placeholder="for example : Nouns"><br>
				Keywords:<br>
				<textarea id="edit_list_keywords" class="form-control"  rows="10"></textarea>
				<button id="edit_list_submit" class="btn btn-success">Save</button>
			</div>
		</div>

		<div id="delete_list_modal" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<span id="delete_list_close" class="close">&times;</span>
				<p id="delete_list_msg"></p>
				<button id="delete_list_submit" class="btn btn-success">Delete</button>
				<button id="delete_list_cancel" class="btn btn-success">Cancel</button>
			</div>
		</div>

		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

		<script type="text/javascript" src="jquery-tagsinput/jquery.tagsinput.js"></script>
		<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>

		<script>
			$(document).ready(function() {

				<?php foreach ($lists as $list_name => $keywords): ?>
					$('#<? echo($list_name); ?>').tagsInput({width:'auto', height:'auto'});
				<?php endforeach; ?>
				
				$('#save_changes').on("click", function(e) {
					var saved = 0;
					e.preventDefault();
					$('#success_msg').html('<font  style="color:#FF0000; font-weight:bold;">Please Wait...</font>');

					$.ajax({
						url: "get_lists.php",
						type: "GET"
					}).done(function(msg) {
						var lists = JSON.parse(msg);

						var data = new FormData();
						data.append("expired_domains", $("#expired_domains").val().replace(/ /g,''));
						data.append("jamies_domains", $("#jamies_domains").val().replace(/ /g,''));
						data.append("dictionary_domains", $("#dictionary_domains").val().replace(/ /g,''));
						$.ajax({
							url:'save_domains.php',
							type:'POST',
							data: data,
							processData: false,
							contentType: false,
							success: function(resp) {
								saved++;
								if (saved == 2) {
									$('#success_msg').html('Your data has been saved Succesfully.');
								}
							}
						});

						var data = new FormData();
						for (var i = 0; i < lists.length; i++) {
							var list = lists[i];
							data.append(list, $("#" + list).val().replace(/ /g,''));
						}
						$.ajax({
							url:'save_keywords.php',
							type:'POST',
							data: data,
							processData: false,
							contentType: false,
							success: function(resp) {
								saved++;
								if (saved == 2) {
									$('#success_msg').html('Your data has been saved Succesfully.');
								}
							}
						});
					});
				});
			});
        </script>

        <script>
			// Get the modal
			var add_list_modal = document.getElementById('add_list_modal');
			var edit_list_modal = document.getElementById('edit_list_modal');
			var delete_list_modal = document.getElementById('delete_list_modal');

			// Get the button that opens the modal
			var add_list = document.getElementById('add_list');

			$('.edit_list').on("click", function(e) {
				var thiss = $(this);
				$('#edit_list_name').val(thiss.attr('list').replace(/_/g, ' '));
				$('#edit_list_keywords').val(thiss.next('label').next('input').val());
				$('#edit_list_submit').attr('list_name', thiss.attr('list'));
				edit_list_modal.style.display = "block";
			});

			$('.delete_list').on("click", function(e) {
				var thiss = $(this);
				$('#delete_list_msg').text('Are you sure to delete ' + thiss.attr('list').replace(/_/g, ' ') + ' list?');
				$('#delete_list_submit').attr('list_name', thiss.attr('list'));
				delete_list_modal.style.display = "block";
			});

			// Get the <span> element that closes the modal
			var add_list_close = document.getElementById('add_list_close');
			var edit_list_close = document.getElementById('edit_list_close');
			var delete_list_close = document.getElementById('delete_list_close');
			var delete_list_cancel = document.getElementById('delete_list_cancel');

			var add_list_submit = document.getElementById('add_list_submit');
			var edit_list_submit = document.getElementById('edit_list_submit');
			var delete_list_submit = document.getElementById('delete_list_submit');

			// When the user clicks the button, open the modal 
			add_list.onclick = function() {
				add_list_modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			add_list_close.onclick = function() {
				add_list_modal.style.display = "none";
			}

			edit_list_close.onclick = function() {
				edit_list_modal.style.display = "none";
			}

			delete_list_close.onclick = function() {
				delete_list_modal.style.display = "none";
			}

			delete_list_cancel.onclick = function() {
				delete_list_modal.style.display = "none";
			}

			add_list_submit.onclick = function() {
				var list_name = $("#add_list_name").val().replace(/ /g,'_');
				if (list_name != "")
				{
					var data = new FormData();
					data.append('list_name', list_name);

					$.ajax({
						url:'add_list.php',
						type:'POST',
						processData: false,
						contentType: false,
						data: data,
						success: function(resp){
							add_list_modal.style.display = "none";

							$("#lists").append('<div class="form-group"><label>' + list_name.replace(/_/g, ' ') + '</label><input class="tags" type="text" id="' + list_name + '"></div>');

							$('#' + list_name).tagsInput({width:'auto', height:'auto'});

							$('#success_msg').html('Your list has been added Succesfully.');
						}
					});
				}
				else {
					window.alert("List name must not be empty. Try again.");
				}
			}

			edit_list_submit.onclick = function() {
				var new_list_name = $("#edit_list_name").val().replace(/ /g,'_');
				if (new_list_name != "")
				{
					var list_name = this.getAttribute('list_name');
					var new_keywords = $('#edit_list_keywords').val().replace(/ /g,'');
					var data = new FormData();
					data.append('new_list_name', new_list_name);
					data.append('new_keywords', new_keywords);
					data.append('list_name', list_name);

					$.ajax({
						url:'edit_list.php',
						type:'POST',
						processData: false,
						contentType: false,
						data: data,
						success: function(resp){
							edit_list_modal.style.display = "none";

							$('#' + list_name).prev('label').attr('list', new_list_name);

							$('#' + list_name).prev('label').prev('label').attr('list', new_list_name);

							$('#' + list_name).prev('label').prev('label').prev('label').text(new_list_name);

							$('#' + list_name).val(new_keywords);

							$('#' + list_name).removeAttr('style');

							$('#' + list_name).removeAttr('data-tagsinput-init');

							$('#'  + list_name).next('div').remove();

							$('#' + list_name).attr('id', new_list_name);

							$('#' + new_list_name).tagsInput({width:'auto', height:'auto'});

							$('#success_msg').html(list_name + ' list has been changed Succesfully.');
						}
					});
				}
				else {
					window.alert("List name must not be empty. Try again.");
				}
			}

			delete_list_submit.onclick = function() {
				var list_name = this.getAttribute('list_name');
				var data = new FormData();
				data.append('list_name', list_name);

				$.ajax({
					url:'delete_list.php',
					type:'POST',
					processData: false,
					contentType: false,
					data: data,
					success: function(resp){
						delete_list_modal.style.display = "none";

						$('#' + list_name).parents('div.form-group').first().remove();

						$('#success_msg').html(list_name + ' list has been deleted Succesfully.');
					}
				});
			}

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == add_list_modal) {
                    add_list_modal.style.display = "none";
                }
				else if (event.target == edit_list_modal) {
					edit_list_modal.style.display = "none";
				}
				else if (event.target == delete_list_modal) {
					delete_list_modal.style.display = "none";
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
                                $('#success_msg').html("");
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
