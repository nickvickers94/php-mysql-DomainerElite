<?php
  require_once('templates/headers/opening.tpl.php');
?>

<?
  $layout = 'full-layout'; // 'full-layout', 'middle-layout', 'boxed-layout'  
  $navbar_top_fixed = 0;
?>

<?php setlocale(LC_MONETARY, 'en_US.UTF-8'); ?>

<!-- Specific Page Data -->
<?php $title = 'Marketplace - Buy Domains/Websites'; ?>
<?php $keywords = 'HTML5 Template, CSS3, All Purpose Admin Template, Vendroid'; ?>
<?php $description = 'Data Tables - Responsive Admin HTML Template'; ?>
<?php $page = 'tables';   // To set active on the same id of primary menu ?>

<?php
	 // Specific Data Tables CSS
	 $specific_css[0] = 'plugins/dataTables/css/jquery.dataTables.css';   // Data Table CSS
	 $specific_css[1] = 'plugins/dataTables/css/dataTables.bootstrap.css';   // Data Table CSS
?>
<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>

<style type="text/css">
  .button_column {
    width: 300px;
  }
</style>

<div class="content">
  <div class="container">
    <?php
      if ($navbar_left_config != 0) {
        $current_navbar="vd_navbar-left"; require('templates/navbars/'.$navbar_left.'.tpl.php');
      }
    ?>

    <?php
      if ($navbar_right_config != 0) {
        $current_navbar="vd_navbar-right";
        require('templates/navbars/'.$navbar_right.'.tpl.php');
      }
    ?>

    <!-- Middle Content Start -->

    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a href="index.php">Home</a> </li>
                <li><a href="marketplace.php">Marketplace</a> </li>
                <li class="active">Buy Domains</li>
              </ul>
              <?php include('templates/widgets/panel-menu-head-section.tpl.php'); ?> 
            </div>
          </div>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header" style="padding-bottom: 10px">
              <h1>Buy Domains/Websites</h1>
            </div>
            
            <div class="vd_content-section clearfix">
              <div class="row">
                <div class="col-md-12">
                  <div class="panel widget">
                    <div class="panel-heading vd_bg-white">
                      <div class="tabs widget" style="padding-bottom: 20px; margin-top: 10px">
                        <ul class="nav nav-tabs widget">
                          <li class="active"> <a href="marketplace.php"> Buy Domains <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>    
                          <li> <a href="marketplace-sell.php"> Sell Domains </a></li>
                          <li> <a href="marketplace-mylistings.php"> My Listings </a></li>
                          <li> <a href="marketplace-profile.php"> My Profile <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
                        </ul>
                      </div>
                    </div>
                  
                    <div class="panel-body table-responsive">
                      <table class="table table-striped" id="data-tables">
                        <thead>
                          <tr>
                            <th>Domain</th>
                            <th>Description</th>
                            <th>Date Listed</th>
                            <th>Likes</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th class="no-sort">&nbsp;</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                  <!-- Panel Widget --> 
                </div>
                <!-- col-md-12 --> 
              </div>
              <!-- row --> 
            </div>
            <!-- .vd_content-section --> 
          </div>
          <!-- .vd_content --> 
        </div>
        <!-- .vd_container --> 
      </div>
      <!-- .vd_content-wrapper -->
    </div>
    <!-- Middle Content End --> 
  </div>
  <!-- .container --> 
</div>
<!-- .content -->

<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>

<script type="text/javascript" src="plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plugins/dataTables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    "use strict";
    
    $('#data-tables').dataTable({
      "ajax": 'marketplace-data.php',
      "columnDefs": [
        { className: "button_column", "targets": [ 7 ] }
      ]
    });
  });
</script>

<!-- Specific Page Scripts END -->

<?php require_once('templates/footers/closing.tpl.php'); ?>

<script>
	function vote(id) {
  	<?php if ($_SESSION['id'] != '22'): ?>
      $("#like_" + id).prop('disabled', true);
    <?php endif ?>
  	$.ajax({
      type: "POST",
      url: "marketplace_vote.php",
      dataType: "json",
      data: { "id": id },
      success: function(data) {
      	$("#votes_" + id).html(data.votes);
      }
    });
	}
</script>