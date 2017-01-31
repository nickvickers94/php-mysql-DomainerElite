<?php include 'membercontrol/auth.php'; ?>
<?php 
	if ($_SESSION['assistance'] == 'N') {
		//header("Location: http://www.domainerelite.com/us3.php"); 
		echo "<center><h1>Assistance package upgrades are currently unavailable.</h1></center>";
		exit;
	}
?>
<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Specific Page Data -->
<?php $title = 'Members'; ?>
<?php $keywords = 'Domainer Elite'; ?>
<?php $description = 'Domainer Elite Members'; ?>
<?php $page = 'tables';   // To set active on the same id of primary menu ?>
<!-- End of Data -->

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
                <li><a href="index.php">Assistance</a> </li>
              </ul>
              <?php include('templates/widgets/panel-menu-head-section.tpl.php'); ?>
            </div>
          </div>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Assistance</h1>
              <small class="subtitle">Your Flippa Listing Upgrade.</small> </div>
          </div>
          <div class="vd_content-section clearfix">
            <!-- row -->
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget light-widget panel-bd-top">
                  <div class="panel-heading no-title"> </div>
                  <div class="panel-body">
                    <div class="content-list content-blog-large">
                   	<p><strong>Important:</strong> Please make contact with Jamie and Vinny at <a href="mailto:specialprojectwithjamie@gmail.com">specialprojectwithjamie@gmail.com</a> by sending an email with the subject: SPECIAL FLIPPA LISTING so we can work together.</p>
                   	<p>You can download two separate listing templates below. We have supplied you a <a href="FlippalistingforJamieSTORES-1.pdf">"package" template</a> (Just edit out my unique names) and a <a href="flippalistingtemplate.rtf">singular template</a>.</p>
                   	<p>Please email us and also look out for any emails from specialprojectwithjamie@gmail.com (Add that address to your address book so we can work together. See you soon!</p>
                    <br /><br />
                    <center>
                    <p style="font-size: 24px"><a href="FlippalistingforJamieSTORES-1.pdf">Package Template</a></p>
                    <p style="font-size: 24px"><a href="flippalistingtemplate.rtf">Singular Template</a></p>
                    </center>
                    </div>
                  </div>
                </div>
                <!-- Panel Widget --> 
                
              </div>
              <!-- col-md-4 -->
              

              <!-- col-md-4 --> 
              
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
