<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Specific Page Data -->
<?php $title = 'Members'; ?>
<?php $keywords = 'Domainer Elite'; ?>
<?php $description = 'Domainer Elite Members'; ?>
<?php $page = 'pages';   // To set active on the same id of primary menu ?>
<?php 
	// Specific Configuration
	$header = 'header-empty'; 
	$body_extra_class="remove-navbar login-layout";  
	$footer = "footer-2"; 
	$background = "background-login"; 
	$navbar_left_config = 0;
	$navbar_right_config = 0; 
?>

<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>

<div class="content">
  <div class="container"> 
    
    <!-- Middle Content Start -->
    
    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_content-section clearfix">
            <div class="vd_login-page">
              <div class="heading clearfix">
                <div class="logo">
                  <h2 class="mgbt-xs-5"><img src="img/logo.png" alt="logo"></h2>
                </div>
                <h4 class="text-center font-semibold vd_grey">LOGIN TO YOUR ACCOUNT</h4>
              </div>
              <div class="panel widget">
                <div class="panel-body">
                  <div class="login-icon entypo-icon"> <i class="icon-key"></i> </div>
                  <form class="form-horizontal" id="login-form" action="membercontrol/login.php" role="form">
                  <div class="alert alert-danger vd_hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Invalid Login!</strong></div>
                  <div class="alert alert-success vd_hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Login Successful!</strong></div>                  
                    <div class="form-group  mgbt-xs-20">
                      <div class="col-md-12">
                        <div class="label-wrapper sr-only">
                          <label class="control-label" for="email">Email</label>
                        </div>
                        <div class="vd_input-wrapper" id="email-input-wrapper"> <span class="menu-icon"> <i class="fa fa-envelope"></i> </span>
                          <input type="email" placeholder="Email" id="email" name="email" class="required" required>
                        </div>
                      </div>
                    </div>
                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                    <div class="form-group">
                      <div class="col-md-12 text-center mgbt-xs-5">
                        <button class="btn vd_bg-green vd_white width-100" type="submit" id="login-submit">Login</button>
                      </div>
                      <div class="col-md-12">

                      </div>
                      
                    </div>
                  </form>
                  
                </div>
              </div>
              <!-- Panel Widget -->
             <center>Your credit card or bank statement will show a charge from "CLCKBETTER.COM"<br />
             <a href="https://clickbetter.com/contact.php">ClickBetter Billing Support</a> | <a href="http://domainerelite.com/cb/refund-policy.htm" target="_blank">Refund Policy</a>
             </center>
            </div>
            <!-- vd_login-page --> 
            
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
<?php include('templates/scripts/pages-login.tpl.php'); ?>

<!-- Specific Page Scripts END -->

<?php require_once('templates/footers/closing.tpl.php'); ?>
