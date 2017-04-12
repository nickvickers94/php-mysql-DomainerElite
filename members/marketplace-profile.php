<?php include 'membercontrol/settings.php'; ?>
<?php require_once('templates/headers/opening.tpl.php'); ?>
<? setlocale(LC_MONETARY, 'en_US.UTF-8'); ?>
<? if ($_GET['id']) {
	$user_id = $_GET['id'];
} else {
	$user_id = $_SESSION['id'];
}
?>
<!-- Specific Page Data -->
<?php $title = 'Marketplace - View Profile'; ?>
<?php $keywords = 'HTML5 Template, CSS3, All Purpose Admin Template, Vendroid'; ?>
<?php $description = 'User Profile Form - Responsive Admin HTML Template'; ?>
<?php $page = 'pages';   // To set active on the same id of primary menu ?>
<?php $specific_css[] = "plugins/jquery-file-upload/css/jquery.fileupload.css"; ?>
<?php $specific_css[] = "plugins/jquery-file-upload/css/jquery.fileupload-ui.css"; ?>
<?php
	$link = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname);
	$query = "SELECT firstname, lastname, about, contactemail, website, facebook, twitter FROM members WHERE id='$user_id'";
	$result = mysql_query($query);
	list($firstname, $lastname, $about, $contactemail, $website, $facebook, $twitter) = mysql_fetch_array($result);
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
                <li><a href="marketplace.php">Maketplace</a> </li>
                <li class="active">User Profile - <?php echo $firstname; ?> <?php echo $lastname; ?></li>
              </ul>
              <?php include('templates/widgets/panel-menu-head-section.tpl.php'); ?> 
            </div>
          </div>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>User Profile - <?php echo $firstname; ?> <?php echo $lastname; ?></h1>
            </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-sm-15">
                <div class="panel widget light-widget">
                  <div class="panel-heading no-title"> </div>
                  <div  class="panel-body">
                    <div class="tabs widget" style="padding-bottom: 20px">
                      <ul class="nav nav-tabs widget">
                        <li> <a href="marketplace.php"> Buy Domains </a></li>    
                        <li> <a href="marketplace-sell.php"> Sell Domains </a></li>
                        <li> <a href="marketplace-mylistings.php"> My Listings </a></li>
                        <li class="active"> <a href="marketplace-profile.php"> My Profile <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
                      </ul>
                    </div>
                    <div class="row">
                      <div class="col-sm-3 mgbt-xs-20">
                        <div>
                          <table class="table" style="border: 0">
                            <tbody style="border: 0">
                              <tr style="border: 0">
                                <td style="width:60%; border: 0;">Status</td>
                                <td style="border: 0"><span class="label label-success">Active</span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="form-group">
                          <div class="col-xs-12">
                          <?php $image = 'images/no_image_user.png'; ?>
                          <?php if (file_exists('/home/domainerelite/public_html/members/images/members/' . $user_id . '.png')) $image = 'images/members/' . $user_id . '.png'; ?>
                          <?php if (file_exists('/home/domainerelite/public_html/members/images/members/' . $user_id . '.gif')) $image = 'images/members/' . $user_id . '.gif'; ?>
                          <?php if (file_exists('/home/domainerelite/public_html/members/images/members/' . $user_id . '.jpg')) $image = 'images/members/' . $user_id . '.jpg'; ?>
                          <?php if (file_exists('/home/domainerelite/public_html/members/images/members/' . $user_id . '.jpeg')) $image = 'images/members/' . $user_id . '.jpeg'; ?>
                            <div class="form-img text-center mgbt-xs-15"> <img id="profileimage" alt="profile image" src="<?php echo $image; ?>"> </div>
                            <div class="form-img-action text-center mgbt-xs-20"><br></div>
                            <br/>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-9" >
                        <div class="row" >
                          <div class="col-md-9" style="margin-top: 6px">
                            <span style="font-weight: bold; font-size: 24px;">About <?php echo $firstname; ?> <?php echo $lastname; ?></span><br />
                            <?php echo nl2br($about); ?>
                          </div>
                          <div class="col-md-3" style="margin-top: 6px">
                            <?php if ($user_id == $_SESSION['id']): ?>
                            <a href="marketplace-editprofile.php" class="btn vd_btn vd_bg-yellow btn-sm" type="button"><i class="fa fa-pencil"></i> Edit Profile</a>
                            <?php endif ?>
                          </div>      
                        </div>
                        <div class="row">
                          <div class="col-md-12">
					                  <?php if ($website): ?><a class="btn vd_btn vd_round-btn vd_bg-green mgr-10 btn-sm" href="<?php echo $website; ?>" target="_blank"><i class="fa fa-globe fa-fw "></i></a><?php endif ?>
					                  <?php if ($twitter): ?><a class="btn vd_btn vd_round-btn vd_bg-facebook mgr-10 btn-sm" href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook fa-fw "></i></a><?php endif ?>
					                  <?php if ($twitter): ?><a class="btn vd_btn vd_round-btn vd_bg-twitter mgr-10 btn-sm" href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter fa-fw "></i></a><?php endif ?>
                          </div>
                        </div>
                      </div>
                      <!-- col-sm-12 --> 
                    </div>
                    <!-- row -->
                    <div class="row">
                      <span style="font-weight: bold; font-size: 24px;"><?php echo $firstname; ?>'s Listings</span><br /><br />
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
                    
                        <?php
                          $link = mysql_connect($dbhost,$dbuser,$dbpass);
                  				mysql_select_db($dbname);
                  				$query = "SELECT id, domain, type, price, link, category FROM marketplace_domains WHERE user_id='$user_id'";
                  				$result = mysql_query($query);
                  			?>

                        <tbody>
                        <?php while (list($id, $domain, $type, $price, $link, $category) = @mysql_fetch_array($result)): ?>
                          <tr id="row_<?php echo $id; ?>" class="odd gradeX">
                            <td><?php echo $domain; ?></td>
                            <td><?php echo $type; ?></td>
                            <td><?php echo $category; ?></td>
                            <td class="center"><?php echo($price); ?></td>
                            <td class="center" style='white-space: nowrap'>
                            <?php if ($user_id == $_SESSION['id'] or $_SESSION['id'] == 22): ?>
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
                  <!-- panel-body -->
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

<?php include('templates/scripts/listtables-data-tables.tpl.php'); ?>
<?php include('templates/scripts/marketplace.tpl.php'); ?>
<!-- Specific Page Scripts END -->

<?php require_once('templates/footers/closing.tpl.php'); ?>