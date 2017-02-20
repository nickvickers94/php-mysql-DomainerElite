<?php include 'membercontrol/auth.php'; ?>
<?php require_once('templates/headers/opening.tpl.php'); ?>
<? setlocale(LC_MONETARY, 'en_US.UTF-8'); ?>

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
                <li><a href="listtables-tables-variation.php">List &amp; Tables</a> </li>
                <li class="active">Data Tables</li>
              </ul>
              <?php include('templates/widgets/panel-menu-head-section.tpl.php'); ?> 
            </div>
          </div>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header" style="padding-bottom: 10px">
              <h1>My Listings</h1>
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
                          <th>Type</th>
                          <th>Category</th>
                          <th>Price</th>
                          <th class="no-sort" style="width: auto">&nbsp;</th>
                        </tr>
                      </thead>
                      
<?php $link = mysql_connect($dbhost,$dbuser,$dbpass);
				mysql_select_db($dbname);
				$query = "SELECT id, domain, type, price, link, category FROM marketplace_domains WHERE user_id='{$_SESSION['id']}'";
				$result = mysql_query($query);
				?>
                      <tbody>
                      <?php while (list($id, $domain, $type, $price, $link, $category) = @mysql_fetch_array($result)): ?>
                        <tr id="row_<?php echo $id; ?>" class="odd gradeX">
                          <td><?php echo $domain; ?></td>
                          <td><?php echo $type; ?></td>
                          <td><?php echo $category; ?></td>
                          <td class="center"><?php echo money_format('%.2n',$price); ?></td>
                          <td class="center" style='white-space: nowrap'>
                          <?php if ($user_id = $_SESSION['id']): ?>
                          <a href="marketplace-editlisting.php?id=<?php echo $id; ?>" class="btn vd_btn vd_bg-green btn-xs"><i class="fa fa-pencil"></i> Edit Listing</a> 
                          <button class="btn vd_btn vd_bg-red btn-xs" onclick="deleteListing(<?php echo $id; ?>);"><i class="fa fa-trash"></i> Delete Listing</button> 
                          <?php else: ?>
                          <a href="<?php echo $link; ?>" target="_blank" class="btn vd_btn vd_bg-blue btn-xs"><i class="fa fa-shopping-cart"></i> View Listing</a></td>
                          <?php endif ?>
                        </tr>
    <?php endwhile ?>
                      </tbody>
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
    
    <!-- Middle Content End --> 
    
  </div>
  <!-- .container --> 
</div>
<!-- .content -->

<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>

<!-- Specific Page Scripts Put Here -->
<?php include('templates/scripts/listtables-data-tables.tpl.php'); ?>
<?php include('templates/scripts/marketplace.tpl.php'); ?>

<!-- Specific Page Scripts END -->

<?php require_once('templates/footers/closing.tpl.php'); ?>