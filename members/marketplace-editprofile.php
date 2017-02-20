<?php include 'membercontrol/auth.php'; ?>
<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Specific Page Data -->
<?php $title = 'Marketplace - Edit Profile'; ?>
<?php $keywords = 'HTML5 Template, CSS3, All Purpose Admin Template, Vendroid'; ?>
<?php $description = 'User Profile Form - Responsive Admin HTML Template'; ?>
<?php $page = 'pages';   // To set active on the same id of primary menu ?>
<?php $specific_css[] = "plugins/jquery-file-upload/css/jquery.fileupload.css"; ?>
<?php $specific_css[] = "plugins/jquery-file-upload/css/jquery.fileupload-ui.css"; ?>
<?php
	$link = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($dbname);
	$query = "SELECT firstname, lastname, about, contactemail, website, facebook, twitter FROM members WHERE id='{$_SESSION['id']}'";
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
                <li class="active">Edit Profile</li>
              </ul>
              <?php include('templates/widgets/panel-menu-head-section.tpl.php'); ?> 
            </div>
          </div>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Edit Profile</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-sm-15">
              
                <div class="panel widget light-widget">
                  <div class="panel-heading no-title"> </div>
                  <form id="profileform" class="form-horizontal" action="marketplace-update-profile.php" role="form">
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
                            <?php if (file_exists('/home/domainerelite/public_html/members/images/members/' . $_SESSION['id'] . '.png')) $image = 'images/members/' . $_SESSION['id'] . '.png'; ?>
                            <?php if (file_exists('/home/domainerelite/public_html/members/images/members/' . $_SESSION['id'] . '.gif')) $image = 'images/members/' . $_SESSION['id'] . '.gif'; ?>
                            <?php if (file_exists('/home/domainerelite/public_html/members/images/members/' . $_SESSION['id'] . '.jpg')) $image = 'images/members/' . $_SESSION['id'] . '.jpg'; ?>
                            <?php if (file_exists('/home/domainerelite/public_html/members/images/members/' . $_SESSION['id'] . '.jpeg')) $image = 'images/members/' . $_SESSION['id'] . '.jpeg'; ?>
                              <div class="form-img text-center mgbt-xs-15"> <img id="profileimage" alt="profile image" src="<?php echo $image; ?>"> </div>
                              <div class="form-img-action text-center mgbt-xs-20">
                              
                              
                              
                              
                              
                              
                                    <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="fa fa-cloud-upload"></i> <span>Upload</span> 
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]" multiple>
                    </span> <br>
                    <br>
                    <!-- The global progress bar -->
                    <div id="progress" class="progress" style="visibility: hidden">
                      <div class="progress-bar progress-bar-success"></div>
                    </div>
                    <!-- The container for the uploaded files -->
                    <div id="files" class="files"></div>
                              
                              
                              
                              
                              
                              
                              
                              </div>
                              <br/>
                           
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-9">
                          <h3 class="mgbt-xs-15">Profile Setting</h3>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="firstname"  placeholder="first name" value="<?php echo $firstname; ?>" data-rule-required="true">
                                </div>
                                <!-- col-xs-9 -->
               
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="lastname" placeholder="last name" value="<?php echo $lastname; ?>" data-rule-required="true">
                                </div>
                                <!-- col-xs-9 -->
                 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          

                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">About</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <textarea rows="3" name="about"><?php echo $about; ?></textarea>
                                </div>
                                <!-- col-xs-12 -->

                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <hr/>
                          <h3 class="mgbt-xs-15">Contact Setting</h3>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="contactemail" placeholder="email address" value="<?php echo $contactemail; ?>" data-rule-email="true">
                                </div>
                                <!-- col-xs-12 -->
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Website</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="website" placeholder="website" value="<?php echo $website; ?>" data-rule-url="true">
                                </div>
                                <!-- col-xs-9 -->

                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Facebook</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="facebook" placeholder="facebook" value="<?php echo $facebook; ?>" data-rule-url="true">
                                </div>
                                <!-- col-xs-9 -->
  
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Twitter</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="twitter" placeholder="twitter" value="<?php echo $twitter; ?>" data-rule-url="true">
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
                      <!-- row -->
                      <div style="height: 60px">
                      <div class="alert alert-success" style="display: none"><span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span> Your profile has been saved.</div>
                      <div class="alert alert-danger" style="display: none"><span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Your profile was not saved.</div>
                    </div>
                    </div>
                    <!-- panel-body -->
                    <div class="pd-20">
                      <button class="btn vd_btn vd_bg-green col-md-offset-8"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Save Profile</button>
                    </div>
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