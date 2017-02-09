<?php include 'membercontrol/auth.php'; ?>
<?php require_once('templates/headers/opening.tpl.php'); ?>
<script type="text/javascript" src="swfobject.js"></script>
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
                <li><a href="index.php">Home</a> </li>
              </ul>
              <?php include('templates/widgets/panel-menu-head-section.tpl.php'); ?>
            </div>
          </div>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Welcome To Domainer Elite</h1>
              <small class="subtitle">Buying and Selling Domains.</small> </div>
          </div>
          <div class="vd_content-section clearfix">
            <!-- row -->
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget light-widget panel-bd-top">
                  <div class="panel-heading no-title"> </div>
                  <div class="panel-body">
                    <iframe id="video" src="https://www.youtube.com/embed/jlEk2g7eAYU?rel=0&modestbranding=1"></iframe>
                  </div>
                </div>
                <!-- Panel Widget --> 
                
              </div>

              <div class="col-md-12">
                <div class="panel widget light-widget panel-bd-top">
                  <div class="panel-heading no-title"> </div>
                  <div class="panel-body">
                    <iframe id="video" src="https://www.youtube.com/embed/jlEk2g7eAYU?rel=0&modestbranding=1"></iframe>
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
