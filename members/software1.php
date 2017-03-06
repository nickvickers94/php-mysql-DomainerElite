<?php include 'membercontrol/auth.php'; ?>
<?php 
	if ($_SESSION['software_pro'] == 'N') {
		die('unauthorized');
		exit;
	}
?>
<?php

	require_once("includes/conn.php");

	$sql = "SELECT list_name, keywords FROM lists WHERE 1";
	$result = $conn->query($sql);

	while (list($list_name, $keywords) = mysqli_fetch_array($result)) {
		$lists[$list_name] = $keywords;
	}

?>

<?php

	$str_first_lists = "";
	$str_first_words = "";
	$str_second_lists = "";
	$str_second_words = "";

	foreach ($lists as $listname => $keywords) {

		$arr_keywords = explode(",", str_replace(" ", "", $keywords));

		$list_show_name = str_replace("_", " ", $listname);

		if ($listname != "start_keywords" && $listname != "extentions") {

			$str_second_words .= '<li class="dropdown-submenu"><a class="test" tabindex="1">'.$list_show_name.'<span class="caret"></span></a><ul class="dropdown-menu">';

			foreach ($arr_keywords as $keyword) {

				$str_second_words .= '<li class="dropdown-item"><a tabindex="2">'.$keyword.'</a></li>';

			}

			$str_second_words .= '</ul></li>';

			$str_second_lists .= '<li class="dropdown-item"><a tabindex="1">'.$list_show_name.'</a></li>';

		}

		if ($listname != "end_keywords" && $listname != "extentions") {

			$str_first_words .= '<li class="dropdown-submenu"><a class="test" tabindex="1">'.$list_show_name.'<span class="caret"></span></a><ul class="dropdown-menu">';

			foreach ($arr_keywords as $keyword) {

				$str_first_words .= '<li class="dropdown-item"><a tabindex="2">'.$keyword.'</a></li>';

			}

			$str_first_words .= '</ul></li>';

			$str_first_lists .= '<li class="dropdown-item"><a tabindex="1">'.$list_show_name.'</a></li>';

		}

	}

?>

<?php require_once('templates/headers/opening.tpl.php'); ?>



<!-- Specific Page Data -->

<?php $title = 'Members'; ?>

<?php $keywords = 'Domainer Elite'; ?>

<?php $description = 'Domainer Elite Members'; ?>

<?php $page = 'tables';   // To set active on the same id of primary menu ?>

<!-- End of Data -->



<link rel="stylesheet" href="css/style.css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



<script type="text/javascript" src="swfobject.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>

	$(document).on("click",".dropdown-submenu a.test",function(e){

		$(this).next('ul').toggle();

		e.stopImmediatePropagation();

		e.preventDefault();

	});


	$(document).on("click",".dropdown-menu li.dropdown-item",function(e){

		var keyword = "";

		var list = "";

		var html = $(this).has('a').html();

		var tabindex = html.substr(html.search("tabindex") + 10, 1);

		if (tabindex == "1") {

			list = $(this).has('a').text();

			$(this).parents('div').first().children('button').first().text(list);

			list = list.replace(/ /g,'_');

			var id = $(this).parents('div').first().children('button').first().attr("id");

			if (id != "extention") {

				$.ajax({

					url: "get_keywords.php",

					type: "POST",

					data: {

						"list_name": list

					}

				}).done(function(msg) {

					var keywords = JSON.parse(msg);

					var str_keywords = "";

					for (var i = 0; i < keywords.length; i++) {

						str_keywords += keywords[i] + "\n";

					}

					alert(str_keywords);

				});

			}

		}

		else if (tabindex == "2") {

			keyword = $(this).has('a').text();

			listname = $(this).parent('ul').prev('a').text().replace(/ /g, '_');

			$(this).parents('div').first().children('button').first().text(keyword);

		}

		$(this).parents('div').first().children('button').attr("list", list);

	});

	$(document).ready(function(){

		$('#search2').on("click", function(e){

			$('#result').html("");

			$('#loading_msg').html('<font style="color:#FF0000; font-weight:bold;">Please Wait...</font>');

			var val = 1;

			var first_list = $('#firstlist').attr("list");

			var second_list = $('#secondlist').attr("list");

			var extention = $('#extention').attr("list");

			var first_keyword = "";

			var second_keyword = "";

			var domain = "";



			if (first_list == "") {

				first_keyword = $('#firstlist').text();

				if (second_list == "") {

					second_keyword = $('#secondlist').text();

					domain = first_keyword + second_keyword + extention;

					$.ajax({

						url: "process1.php",

						type: "POST",

						data: {

							"i": val,

							"domain": domain,

							"option": val

						}

					}).done(function(msg) {

						var result = JSON.parse(msg);

						if (result[1] != null && result[1] != "") {

							$("#result").append(result[1]);

							$('#loading_msg').html('Domain is available.');

						}

						else {

							$('#loading_msg').html('<font style="color:#FF0000; font-weight:bold;">' + domain + ' is not available.</font>');

						}

					});

				}

				else if (second_list != "") {

					$.ajax({

						url: "get_keywords.php",

						type: "POST",

						data: {

							"list_name": second_list

						}

					}).done(function(msg) {

						var second_keywords = JSON.parse(msg);

						for (var i = second_keywords.length - 1; i >= 0; i--) {

							second_keyword = second_keywords[i];

							domain = first_keyword + second_keyword + extention;

							$.ajax({

								url: "process1.php",

								type: "POST",

								data: {

									"i": i,

									"domain": domain,

									"option": val

								}

							}).done(function(msg) {

								var result = JSON.parse(msg);

								if (result[1] != null && result[1] != "") {

									$("#result").append(result[1]);

								}

								if (result[0] == 0) {

									$('#loading_msg').html('All the others are not available.');

								}

							});

						}

					});

				}

			}

			else if (first_list != "") {

				$.ajax({

						url: "get_keywords.php",

						type: "POST",

						data: {

							"list_name": first_list

						}

				}).done(function(msg) {

					var first_keywords = JSON.parse(msg);

					if (second_list == "") {

						second_keyword = $('#secondlist').text();

						for (var i = first_keywords.length - 1; i >= 0; i--) {

							first_keyword = first_keywords[i];

							domain = first_keyword + second_keyword + extention;

							$.ajax({

								url: "process1.php",

								type: "POST",

								data: {

									"i": i,

									"domain": domain,

									"option": val

								}

							}).done(function(msg) {

								var result = JSON.parse(msg);

								if (result[1] != null && result[1] != "") {

									$("#result").append(result[1]);

								}

								if (result[0] == 0) {

									$('#loading_msg').html('All the others are not available.');

								}

							});

						}

					}

					else if (second_list != "") {

						$.ajax({

							url: "get_keywords.php",

							type: "POST",

							data: {

							 "list_name": second_list

							}

						}).done(function(msg) {

							var second_keywords = JSON.parse(msg);

							for (var i = first_keywords.length - 1; i >= 0; i--) {

								first_keyword = first_keywords[i];

								for (var j = second_keywords.length - 1; j >= 0; j--) {

									second_keyword = second_keywords[j];

									domain = first_keyword + second_keyword + extention;

									$.ajax({

										url: "process1.php",

										type: "POST",

										data: {

											"i": i + j,

											"domain": domain,

											"option": val

										}

									}).done(function(msg) {

										var result = JSON.parse(msg);

										if (result[1] != null && result[1] != "") {

											$("#result").append(result[1]);

										}

										if (result[0] == 0) {

											$('#loading_msg').html('All the others are not available.');

										}

									});

								}

							}

						});

					}

				});

			}

		});

	});



	$(document).ready(function(){

		$('#search1').on("click", function(e){

			$('#result').html("");

			$('#loading_msg').html('<font style="color:#FF0000; font-weight:bold;">Please Wait...</font>');



			var checked = $('input[name=group1]:checked').next('label').text();

			if (checked == "Expired Domains") {

				var val = 4;

				$.ajax({

					url: "get_domains.php",

					type: "POST",

					data: {

						"domain_list_name": "expired_domains"

					}

				}).done(function(msg) {

					var expired_domains = JSON.parse(msg);

					for (var i = 0; i < expired_domains.length; i++) {

						$.ajax({

							url: "process1.php",

							type: "POST",

							data: {

								"domain" : expired_domains[i],

								"option" : val,

								"i" : i

							}

						}).done(function(msg) {

							var result = JSON.parse(msg);

							if (result[1] != null && result[1] != "") {

								$("#result").append(result[1]);

							}

							if (result[0] == expired_domains.length - 1) {

								$('#loading_msg').html('All the others are not available.');

							}

						});

					}

				});

			}

			else if (checked == "Jamie's Domains") {

				alert(checked);

			}

			else if (checked == "Your Domains") {

				var val = 6;

				$.ajax({

					url: "process1.php",

					type: "POST",

					data: {

						"member_id" : <?php echo($_SESSION['id']); ?>,

						"option": val

					}

				}).done(function(msg) {

					if (msg != null && msg != "") {

						$("#result").append(msg);

					}

				});

				$('#loading_msg').html('');

			}

		});

		$('#first_check').on("click", function(){

			if($(this).is(':checked')){
				$('#first_list').html('<?php echo($str_first_words); ?>');
			}
			else {
				$('#first_list').html('<?php echo($str_first_lists); ?>');
			}
		});

		$('#second_check').on("click", function(){

			if($(this).is(':checked')){
				$('#second_list').html('<?php echo($str_second_words); ?>');
			}
			else {
				$('#second_list').html('<?php echo($str_second_lists); ?>');
			}
		});

	});




	$(document).on("click",".appraise",function(e){

		e.preventDefault();

		var thiss = $(this);

		thiss.text("Loading...");

		$.ajax({

			url:"process1.php",

			type:"POST",

			data: {

				"appraise" : 1,

				"domain": thiss.attr("href")

			}

		}).done(function(msg){

			thiss.text(msg);

		});

	});



	$(document).on("click",".delete",function(e){

		e.preventDefault();

		var thiss = $(this);

		thiss.text("Loading...");

		$.ajax({

			url:"delete.php",

			type:"POST",

			data: {

				"member_id" : <?php echo($_SESSION['id']); ?>,

				"domain": thiss.attr("href")

			}

		}).done(function(msg){

			if (msg == 'Deleted') {
				thiss.parents('li').first().remove();
			}
			else {
				thiss.text("Failed");
			}

		});

	});



	$(document).on("click",".save",function(e){

		e.preventDefault();

		var thiss = $(this);

		thiss.text("Saving...");

		$.ajax({

			url:"save.php",

			type:"POST",

			data: {

				"member_id" : <?php echo($_SESSION['id']); ?>,

				"domain": thiss.attr("href")

			}

		}).done(function(msg){

			thiss.text(msg);

			thiss.removeClass("save");

		});

	});



	$(document).on("click",".vote4",function(e){

		e.preventDefault();

		var thiss = $(this);

		thiss.text("Voting...");

		$.ajax({

			url:"vote.php",

			type:"POST",

			data: {

				"table" : "expired_domains",

				"domain": $(this).attr("href")

			}

		}).done(function(msg){

			thiss.text(msg);

			thiss.removeClass("vote4");

		});

	});

</script>



<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>



<div class="content">



   <div class="container">

		<?php if ($navbar_left_config != 0) { $current_navbar="vd_navbar-left"; require('templates/navbars/'.$navbar_left.'.tpl.php'); }?>

		<?php if ($navbar_right_config != 0) { $current_navbar="vd_navbar-right"; require('templates/navbars/'.$navbar_right.'.tpl.php'); }?>

		

		<!-- Middle Content Start -->

		<div class="vd_content-wrapper">



			<div class="vd_container">



				<div class="vd_content clearfix">



					<div class="vd_head-section clearfix">

						<div class="vd_panel-header">

							<ul class="breadcrumb">

								<li><a href="index.php">Home</a> </li>

							</ul>

							<?php include('templates/widgets/panel-menu-head-section.tpl.php'); ?>

						</div>

					</div>



					<div class="vd_title-section clearfix">

						<div class="vd_panel-header">

							<h1>Welcome To Domainer Elite</h1>

							<small class="subtitle">Buying and Selling Domains.</small> 

						</div>

					</div>



					<div class="vd_content-section clearfix">

						<!-- row -->

						<div class="row">

							<div class="col-md-12">

								<div class="panel widget light-widget panel-bd-top">

									<div class="panel-heading no-title"> </div>

									<div class="panel-body">

										<iframe width="720" height="405" src="https://www.youtube.com/embed/j4kO_NHjeLo?rel=0&modestbranding=1"></iframe>

									</div>

								</div>

							<!-- Panel Widget --> 

							</div>

							

							<div class="col-md-12">

								<div class="panel widget light-widget panel-bd-top">

									<div class="panel-heading no-title"> </div>

									<div class="panel-body">

										<div class="row">

											<div class="group" style="width: 50%;">

												<h1 class="group-name">Search Term 1</h1>

												<section class="section">

													<div class="radiocontainer" style="margin-top: 20px;">

														<input type="radio" name="group1" id="radio-1" checked="1">

														<label for="radio-1"><span class="radio">Expired Domains</span></label>

													</div>

													<div class="radiocontainer">

														<input type="radio" name="group1" id="radio-2">

														<label for="radio-2"><span class="radio">Jamie's Domains</span></label>

													</div>

													<div class="radiocontainer">

														<input type="radio" name="group1" id="radio-3">

														<label for="radio-3"><span class="radio">Your Domains</span></label>

													</div>

												</section>

												<button id = "search1" class="button">Submit</button>

											</div>



											<div class="group" style="width: 50%;">

												<h1 class="group-name">Search Term 2</h1>

												<div class="row">

													<div style="float: left; width: 4%; margin-top: 25px;">
														<input id="first_check" type="checkbox" checked="checked" />
													</div>

													<div class="dropdown" style="float: left; width: 96%;">

														<button id = "firstlist" class="soflow-color dropdown-toggle" type="button" data-toggle="dropdown" style="margin-top: 20px;">Select</button>

														<ul id="first_list" class="dropdown-menu">

															<?php foreach ($lists as $listname => $keywords): ?>

																<?php if ($listname != "end_keywords" && $listname != "extentions"): ?>

																	<?php $arr_keywords = explode(",", str_replace(" ", "", $keywords)); ?>

																	<li class="dropdown-submenu">

																		<a class="test" tabindex="1"><?php echo (str_replace("_", " ", $listname)); ?><span class="caret"></span></a>

																		<ul class="dropdown-menu">

																			<?php foreach ($arr_keywords as $keyword): ?>

																				<li class="dropdown-item"><a tabindex="2"><?php echo($keyword); ?></a></li>

																			<?php endforeach; ?>

																		</ul>

																	</li>

																<?php endif; ?>

															<?php endforeach; ?>

														</ul>

													</div>
												</div>

												<div class="row">

													<div style="float: left; width: 4%; margin-top: 5px;">
														<input id="second_check" type="checkbox" checked="checked" />
													</div>

													<div class="dropdown" style="float: left; width: 96%;">

														<button id="secondlist" class="soflow-color dropdown-toggle" type="button" data-toggle="dropdown">Select</button>

														<ul id="second_list" class="dropdown-menu">

															<?php foreach ($lists as $listname => $keywords): ?>

																<?php if ($listname != "start_keywords" && $listname != "extentions"): ?>

																	<?php $arr_keywords = explode(",", str_replace(" ", "", $keywords)); ?>

																	<li class="dropdown-submenu">

																		<a class="test" tabindex="1"><?php echo (str_replace("_", " ", $listname)); ?><span class="caret"></span></a>

																		<ul class="dropdown-menu">

																			<?php foreach ($arr_keywords as $keyword): ?>

																				<li class="dropdown-item"><a tabindex="2"><?php echo($keyword); ?></a></li>

																			<?php endforeach; ?>

																		</ul>

																	</li>

																	<!-- <li class="dropdown-item"><a tabindex="1"><?php echo(str_replace("_", " ", $listname));?></a></li> -->

																<?php endif; ?>

															<?php endforeach; ?>

														</ul>

													</div>

												</div>


												<div class="dropdown">

													<button id="extention" class="soflow-color dropdown-toggle" type="button" data-toggle="dropdown" list = ".com">.com</button>

													<ul class="dropdown-menu">

														<?php $arr_extentions = explode(",", str_replace(" ", "", $lists["extentions"])); ?>

														<?php foreach ($arr_extentions as $extention): ?>

															<li class="dropdown-item"><a tabindex="1">.<?php echo($extention); ?></a></li>

														<?php endforeach; ?>

													</ul>

												</div>

												<div class="row">
													<button id="search2" class="button" style="float: left; width: 30%; margin-left: 20px;">Submit</button>

													<a href="javascript:history.go(0)" class="button" style="float: left; width: 30%; margin-left: 20px;">Reload</a>

												</div>
												
											</div>

										</div>

									</div>

								</div>

								<!-- Panel Widget --> 

							</div>



							<div class="col-md-12">

								<div class="panel widget light-widget panel-bd-top">

									<div class="panel-heading no-title"> </div>

									<div class="panel-body">

										<div class="menu">

											<ul id = "result"></ul>

										</div>

										<span class="text-success" id="loading_msg"></span>

									</div>

								</div>

								<!-- Panel Widget --> 

							</div>

						</div>

						<!--row --> 

					</div>

					<!-- .vd_content-section --> 

				</div>

				<!-- .vd_content --> 

			</div>

			<!-- .vd_container --> 

		</div>

		<!-- .vd_content-wrapper --> 

		<!-- Middle Content End --> 

	</div>

	<!-- .container --> 

</div>

<!-- .content -->



<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>

<!-- Specific Page Scripts Put Here --> 

<!-- Specific Page Scripts END -->

<?php require_once('templates/footers/closing.tpl.php'); ?>