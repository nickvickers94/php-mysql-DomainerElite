<?php include 'membercontrol/auth.php'; ?>
<?php 
   if ($_SESSION['software'] == 'N') {
   	header("Location: http://www.domainerelite.com/us1.php"); 
   	exit;
   }
   ?>

<?php
   require_once("includes/conn.php");
	$sql = "DESCRIBE domains";
	$result = $conn->query($sql);

	$listnames = array();

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	if ($row["Field"] != "id" && $row["Field"] != "date" && $row["Field"] != "expired_domains" && $row["Field"] != "jamies_domains" && $row["Field"] != "dictionary_domains" && $row["Field"] != "extentions") {
	    		array_push($listnames, $row["Field"]);
	    	}
	    }
	} else {
	    echo "0 results";
	}
?>

<?php
   $row = "";
   $result = $conn->query("SELECT * FROM domains LIMIT 1");
   if($result->num_rows>0){
   	$row = $result->fetch_array(MYSQLI_BOTH);		
   }

   $lists = array();

   foreach ($listnames as $listname) {
   		$lists[$listname] = $row[$listname];
   }

   // file_put_contents("listnames.txt", $listnames);
   // file_put_contents("lists.txt", $lists);

	$domain_keywords = explode(",", str_replace(" ", "", $row["domains_keywords"]));
	$start_keywords = explode(",", str_replace(" ", "", $row["start_keywords"]));
	$end_keywords = explode(",", str_replace(" ", "", $row["end_keywords"]));
	$extentions = explode(",", str_replace(" ", "", $row["extentions"]));
   
   ?>
<?php require_once('templates/headers/opening.tpl.php'); ?>
<script type="text/javascript" src="swfobject.js"></script>
<!-- Specific Page Data -->
<?php $title = 'Members'; ?>
<?php $keywords = 'Domainer Elite'; ?>
<?php $description = 'Domainer Elite Members'; ?>
<?php $page = 'tables';   // To set active on the same id of primary menu ?>
<!-- End of Data -->
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$('.dropdown-submenu a.test').on("click", function(e){
			$(this).next('ul').toggle();
			e.stopPropagation();
			e.preventDefault();
		});
	});

	$(document).ready(function(){
		$('.dropdown-menu li.dropdown-item').on("click", function(e){
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
						for (var i = keywords.length - 1; i >= 0; i--) {
							str_keywords += keywords[i] + "\n";
						}
						alert(str_keywords);
					});
				}
			}
			else if (tabindex == "2") {
				keyword = $(this).has('a').text();
				listname = $(this).parent('ul').prev('a').text();
				if (listname == "Keywords") {
					list = "domains_keywords";
				}
				else if (listname == "Start with") {
					list = "start_keywords";
				}
				else if (listname == "End with") {
					list = "end_keywords";
				}
				$(this).parents('div').first().children('button').first().text(keyword);
			}
			$(this).parents('div').first().children('button').attr("list", list);
		});
	});

	$(document).ready(function(){
		$('#search2').on("click", function(e){
			$('#result').html("");
			var val = 2;
			var first_list = $('#firstlist').attr("list");
			var second_list = $('#secondlist').attr("list");
			var extention = $('#extention').attr("list");
			extention = extention.substr(1);
			var first_keyword = "";
			var second_keyword = "";
			var domain = "";

			if (first_list == "domains_keywords" || first_list == "start_keywords") {
				first_keyword = $('#firstlist').text();
				if (second_list == "domains_keywords" || second_list == "end_keywords") {
					second_keyword = $('#secondlist').text();
					domain = first_keyword + second_keyword;
					$.ajax({
						url: "process1.php",
						type: "POST",
						data: {
							"domain": domain,
							"extention": extention,
							"option": val
						}
					}).done(function(msg) {
						if (msg != null && msg != "") {
							$("#result").append(msg);
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
							domain = first_keyword + second_keyword;
							$.ajax({
								url: "process1.php",
								type: "POST",
								data: {
									"domain": domain,
									"extention": extention,
									"option": val
								}
							}).done(function(msg) {
								if (msg != null && msg != "") {
									$("#result").append(msg);
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
					if (second_list == "domains_keywords" || second_list == "end_keywords") {
						second_keyword = $('#secondlist').text();
						for (var i = first_keywords.length - 1; i >= 0; i--) {
							first_keyword = first_keywords[i];
							domain = first_keyword + second_keyword;
							$.ajax({
								url: "process1.php",
								type: "POST",
								data: {
									"domain": domain,
									"extention": extention,
									"option": val
								}
							}).done(function(msg) {
								if (msg != null && msg != "") {
									$("#result").append(msg);
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
									domain = first_keyword + second_keyword;
									$.ajax({
										url: "process1.php",
										type: "POST",
										data: {
											"domain": domain,
											"extention": extention,
											"option": val
										}
									}).done(function(msg) {
										if (msg != null && msg != "") {
											$("#result").append(msg);
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
			alert($('input[name=group1]:checked').next('label').text());
			$('#result').html("");
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
				"domain":$(this).attr("href")
			}	
		}).done(function(msg){
			thiss.text(msg);
		});
	});

	$(document).on("click",".save",function(e){
		e.preventDefault();
		var thiss = $(this);
		$.ajax({
			url:"save.php",
			type:"POST",
			data: {
				"member_id" : <?php echo($_SESSION['id']); ?>,
				"domain": $(this).attr("href")
			}
		}).done(function(msg){
			thiss.text(msg);
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
                              <iframe width="720" height="405" src="https://www.youtube.com/embed/jlEk2g7eAYU?rel=0&modestbranding=1"></iframe>
                           </div>
                        </div>
                        <!-- Panel Widget --> 
                     </div>
                     <div class="col-md-12">
                        <div class="panel widget light-widget panel-bd-top">
                           <div class="panel-heading no-title"> </div>
                           <div class="panel-body">
                              <div class="row">
                                 <div class="group radiogroup" style="width: 50%;">
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
                                    <div class="dropdown">
                                       <button id = "firstlist" class="soflow-color dropdown-toggle" type="button" data-toggle="dropdown" style="margin-top: 20px;">Select</button>
                                       <ul class="dropdown-menu">
                                       		<?php
                                       			foreach ($lists as $listname => $keywords) {
                                       				if ($listname == "domains_keywords") { ?>
                                       					<li class="dropdown-submenu">
			                                            	<a class="test" tabindex="1">Keywords<span class="caret"></span></a>
			                                            	<ul class="dropdown-menu">
				                                            <?php
	                                       					foreach ($domain_keywords as $keyword) {?>
	                                       						<li class="dropdown-item"><a tabindex="2"><?php echo($keyword); ?></a></li>
	                                       					<?php
	                                       					}
	                                       					?>
	                                       					</ul>
	                                    				</li>
	                                    			<?php
	                                       			}
	                                       			else if ($listname == "start_keywords") { ?>
	                                       				<li class="dropdown-submenu">
				                                            <a class="test" tabindex="1">Start with<span class="caret"></span></a>
					                                        <ul class="dropdown-menu">
					                                        <?php
		                                       				foreach ($start_keywords as $keyword) {?>
		                                       					<li class="dropdown-item"><a tabindex="2"><?php echo($keyword); ?></a></li>
		                                       				<?php
	                                       					}
	                                       					?>
	                                       					</ul>
	                                    				</li>
                                       				<?php
                                       				}
                                       				else if ($listname != "end_keywords") {?>
                                       				<li class="dropdown-item"><a tabindex="1"><?php echo(str_replace("_", " ", $listname));?></a></li>
                                       				<?php
                                       				}
                                       			}
                                       		?>
                                       </ul>
                                    </div>

                                    <div class="dropdown">
                                       <button id="secondlist" class="soflow-color dropdown-toggle" type="button" data-toggle="dropdown">Select</button>
                                       <ul class="dropdown-menu">
                                       		<?php
                                       			foreach ($lists as $listname => $keywords) {
                                       				if ($listname == "domains_keywords") { ?>
                                       					<li class="dropdown-submenu">
			                                            	<a class="test" tabindex="1">Keywords<span class="caret"></span></a>
			                                            	<ul class="dropdown-menu">
				                                            <?php
	                                       					foreach ($domain_keywords as $keyword) {?>
	                                       						<li class="dropdown-item"><a tabindex="2"><?php echo($keyword); ?></a></li>
	                                       					<?php
	                                       					}
	                                       					?>
	                                       					</ul>
	                                    				</li>
	                                    			<?php
	                                       			}
	                                       			else if ($listname == "end_keywords") { ?>
	                                       				<li class="dropdown-submenu">
				                                            <a class="test" tabindex="1">End with<span class="caret"></span></a>
					                                        <ul class="dropdown-menu">
					                                        <?php
		                                       				foreach ($end_keywords as $keyword) {?>
		                                       					<li class="dropdown-item"><a tabindex="2"><?php echo($keyword); ?></a></li>
		                                       				<?php
	                                       					}
	                                       					?>
	                                       					</ul>
	                                    				</li>
                                       				<?php
                                       				}
                                       				else if ($listname != "start_keywords") {?>
                                       				<li class="dropdown-item"><a tabindex="1"><?php echo(str_replace("_", " ", $listname));?></a></li>
                                       				<?php
                                       				}
                                       			}
                                       		?>
                                       </ul>
                                    </div>

                                    <div class="dropdown">
                                       <button id="extention" class="soflow-color dropdown-toggle" type="button" data-toggle="dropdown" list = ".com">.com</button>
                                       <ul class="dropdown-menu">
                                       <?php
                                       	foreach ($extentions as $extention) { ?>
                                       		<li class="dropdown-item"><a tabindex="1">.<?php echo($extention); ?></a></li>
                                       <?php
                                       	}
                                       ?>
                                       </ul>
                                    </div>
                                    <button id="search2" class="button">Submit</button>
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
                                 <ul id = "result">

                                 </ul>
                              </div>
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