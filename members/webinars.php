<?php include 'membercontrol/auth.php'; ?>
<?php 
	if ($_SESSION['webinars'] == 'N') {
		header("Location: http://www.domainerelite.com/us2.php"); 
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
                <li><a href="index.php">Webinars</a> </li>
              </ul>
              <?php include('templates/widgets/panel-menu-head-section.tpl.php'); ?>
            </div>
          </div>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Webinars</h1>

              <small class="subtitle">Register for each of the webinars listed below.</small> </div>
          </div>
          <div class="vd_content-section clearfix">
            <!-- row -->
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget light-widget panel-bd-top">
                  <div class="panel-heading no-title"> </div>
                  <div class="panel-body">
                                <center><strong><a href="https://www.youtube.com/playlist?list=PLWsTGaFGS3NZatbJj9-ru0pVmK9tE0NZ1" style="font-size: 18px; text-decoration: underline;">Previous Webinars Archive</a></strong></center><br />
                                <center><span style="font-size: 18px; font-weight: bold">Upcoming Webinars</span></center><br />
                    <div class="content-list content-blog-large">
                   	<?php include 'webinars/index.php'; ?>
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
