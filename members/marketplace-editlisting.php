<?php include 'membercontrol/auth.php'; ?>
<?php require_once('templates/headers/opening.tpl.php'); ?>
<? setlocale(LC_MONETARY, 'en_US.UTF-8'); ?>
<!-- Specific Page Data -->
<?php $title = 'Marketplace - Edit Listing'; ?>
<?php $keywords = 'HTML5 Template, CSS3, All Purpose Admin Template, Vendroid'; ?>
<?php $description = 'User Profile Form - Responsive Admin HTML Template'; ?>
<?php $page = 'pages';   // To set active on the same id of primary menu ?>
<?php $specific_css[] = "plugins/jquery-file-upload/css/jquery.fileupload.css"; ?>
<?php $specific_css[] = "plugins/jquery-file-upload/css/jquery.fileupload-ui.css"; ?>
<?php $id = $_GET['id']; ?>
<?php $link = mysql_connect($dbhost,$dbuser,$dbpass);
				mysql_select_db($dbname);
				if ($_SESSION['id'] == '22') {
					$query = "SELECT domain, type, category, link, price FROM marketplace_domains WHERE id='$id'";
				} else {
					$query = "SELECT domain, type, category, link, price FROM marketplace_domains WHERE id='$id' AND user_id='{$_SESSION['id']}'";
				}
				$result = mysql_query($query);
				list($domain, $type, $category, $link, $price) = mysql_fetch_array($result);
				if (mysql_num_rows($result) == 0) die ('listing can only be edited by owner.');
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
                <li><a href="marketplace.php">Marketplace</a> </li>
                <li class="active">Sell</li>
              </ul>
              <?php include('templates/widgets/panel-menu-head-section.tpl.php'); ?> 
            </div>
          </div>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Edit Listing</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-sm-15">
              
                <div class="panel widget light-widget">
                  <div class="panel-heading no-title"> </div>
                  <form id="editlistingform" class="form-horizontal" action="marketplace-edit-listing.php" method="post" role="form">
                    <div  class="panel-body">
                     <div class="tabs widget" style="padding-bottom: 20px">
  <ul class="nav nav-tabs widget">
       <li> <a href="marketplace.php"> Buy Domains </a></li>    
    <li class="active"> <a href="marketplace-sell.php"> Sell Domains <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
     <li> <a href="marketplace-mylistings.php"> My Listings </a></li>
    <li> <a href="marketplace-profile.php"> My Profile </a></li>
  </ul>


</div>
                      <div class="row">
        
                        <div class="col-sm-9">
                          <h3 class="mgbt-xs-15" style="margin-top: 10px">Listing Information</h3>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Domain Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="domain" id="domain"  placeholder="Domain name" data-rule-required="true" value="<?php echo $domain; ?>">
                                </div>
                                <!-- col-xs-9 -->
               
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Listing Type</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                 <select name="type" class="selectpicker form-control">
                                 <option value="domain" <?php if ($type == "domain"): ?>selected<?php endif ?>>domain name</option>
                                 <option value="website" <?php if ($type == "website"): ?>selected<?php endif ?>>website</option>
                                 </select>
                                </div>
                                <!-- col-xs-9 -->
    
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                 <select name="category" class="selectpicker form-control">
                                 <option <?php if ($category == "business"): ?>selected<?php endif ?>>business</option>
                                 <option <?php if ($category == "politics"): ?>selected<?php endif ?>>politics</option>
                                 <option <?php if ($category == "science"): ?>selected<?php endif ?>>science</option>
                                 <option <?php if ($category == "health"): ?>selected<?php endif ?>>health</option>
                                 <option <?php if ($category == "hobbies"): ?>selected<?php endif ?>>hobbies</option>
                                 <option <?php if ($category == "keyword domains"): ?>selected<?php endif ?>>keyword domains</option>
                                 <option <?php if ($category == "premium domains"): ?>selected<?php endif ?>>premium domains</option>
                                 <option <?php if ($category == "adult domains"): ?>selected<?php endif ?>>adult domains</option>
                                 </select>
                                </div>
                                <!-- col-xs-9 -->
                 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          

                          
                                    <div class="form-group">
                            <label class="col-sm-3 control-label">Listing URL</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="link" id="link"  placeholder="URL for Flippa listing, GoDaddy auction, etc." data-rule-required="true" data-rule-url="true" value="<?php echo $link; ?>">
                                </div>
                                <!-- col-xs-9 -->
               
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                                 <div class="form-group">
                            <label class="col-sm-3 control-label">Price (US Dollars)</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="price" id="price"  placeholder="Price" data-rule-required="true" data-rule-currency="true" value="<?php echo($price); ?>">
                                </div>
                                <!-- col-xs-9 -->
               
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group --> 
                          
                        </div>
                        <!-- col-sm-12 --> 
                      </div>
                      <!-- row --><div style="height: 60px">
                      <div class="alert alert-success" style="display: none"><span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span> Your listing has been updated.</div>
                      <div class="alert alert-danger" style="display: none"><span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> <span id="error"></span></div>
                    </div>
                    </div>
                    <!-- panel-body -->
                    <div class="pd-20">
                      <button class="btn vd_btn vd_bg-green col-md-offset-8"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Save Listing</button>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                  </form>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-sm-12--> 
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
<?php include('templates/scripts/marketplace.tpl.php'); ?>

<!-- Specific Page Scripts END -->

<?php require_once('templates/footers/closing.tpl.php'); ?>