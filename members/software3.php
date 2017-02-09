<?php include 'membercontrol/auth.php'; ?>
<?php require_once('templates/headers/opening.tpl.php'); ?>
<script type="text/javascript" src="swfobject.js"></script>
<!-- Specific Page Data -->
<?php $title = 'Members'; ?>
<?php $keywords = 'Domainer Elite'; ?>
<?php $description = 'Domainer Elite Members'; ?>
<?php $page = 'tables';   // To set active on the same id of primary menu ?>
<!-- End of Data -->

<link rel="stylesheet" href="css/style.css" />

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
                      <div class="group radiogroup" style="width: 50%; height: 300px;">
                        <ul>
                          <li>
                            <input type="radio" id="f-option" name="selector">
                            <label for="f-option">Expired Domains</label>
                            
                            <div class="check"></div>
                          </li>
                          
                          <li>
                            <input type="radio" id="s-option" name="selector">
                            <label for="s-option">Jamie's Domains</label>
                            
                            <div class="check"><div class="inside"></div></div>
                          </li>
                          
                          <li>
                            <input type="radio" id="t-option" name="selector">
                            <label for="t-option">Your Domains</label>
                            
                            <div class="check"><div class="inside"></div></div>
                          </li>
                        </ul>
                        <button class="button">Submit</button>
                      </div>
                      <div class="group" style="width: 50%; height: 300px;">
                        <select id="soflow-color">
                          <option>Select a Keyword</option>
                          <option>Keyword 1</option>
                          <option>Keyword 2</option>
                        </select>

                        <select id="soflow-color">
                          <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                          <option>Select a Starting Word</option>
                          <option>Word 1</option>
                          <option>Word 2</option>
                        </select>

                        <select id="soflow-color">
                          <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                          <option>Select an Ending Word</option>
                          <option>Word 1</option>
                          <option>Word 2</option>
                        </select>

                        <select id="soflow-color">
                          <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                          <option>Select an Extension</option>
                          <option>.com</option>
                          <option>.info</option>
                        </select>

                        <button class="button">Add Keyword</button>

                        <button class="button">Submit</button>
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
                      <ul>
                        <li>intensecars.com<button class="myButton">Register</button><button class="myButton">Appraise</button><button class="myButton">Save</button><button class="myButton">Sell</button></li>
                        <li>passivecars.com<button class="myButton">Register</button><button class="myButton">Appraise</button><button class="myButton">Save</button><button class="myButton">Sell</button></li>
                        <li>howtodocars.com<button class="myButton">Register</button><button class="myButton">Appraise</button><button class="myButton">Save</button><button class="myButton">Sell</button></li>
                        <li>howtolearncars.com<button class="myButton">Register</button><button class="myButton">Appraise</button><button class="myButton">Save</button><button class="myButton">Sell</button></li>
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
