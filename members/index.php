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
                    <div class="content-list content-blog-large">
                    <center><h2 style="background: yellow; display: none;"><a href="http://www.domainerelite.com/bonus.html" style="color: red">Click HERE to register for an Exclusive Webinar this Wednesday!</a></h2></center>
                      <ul class="list-wrapper">
                      <?php if ($_SESSION['software'] == 'N'): ?>
                      <li>
                    
                        <h4 class="blog-title font-bold letter-xs">Watch these instructional introduction videos now:</h4>
                          <iframe width="720" height="405" src="https://www.youtube.com/embed/GNHRtjbVT4c?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <li>
                        <iframe width="720" height="405" src="https://www.youtube.com/embed/Hb4Bpcqglp0?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <li>
                        <center><h1><a href="webinars.php">CLICK HERE TO REGISTER<br />FOR THE NEXT LIVE WEBINAR</a></h1></center>
                        </li>
                        <li>
                     
                        <h4 class="blog-title font-bold letter-xs">Watch this quick orientation video:</h4>
                          <iframe width="720" height="405" src="https://www.youtube.com/embed/4jesdkEOIec?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <?php else: ?>
                         <li style='padding-top: 0; padding-bottom: 20px;'>
                             <a href='http://www.jamielewisacademy.com/'>
                         <img src='img/animatedbanner.gif'>
                             </a>
                        <h4 style='padding-top: 20px;' class="blog-title font-bold letter-xs">Watch this quick orientation video:</h4>
                          <iframe width="720" height="405" src="https://www.youtube.com/embed/4jesdkEOIec?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <li>
                        <center><h1><a href="webinars.php">CLICK HERE TO REGISTER<br />FOR THE NEXT LIVE WEBINAR</a></h1></center>
                        </li>
						<li>
                        <h4 class="blog-title font-bold letter-xs">Watch these instructional introduction videos now:</h4>
                          <iframe width="720" height="405" src="https://www.youtube.com/embed/GNHRtjbVT4c?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </li>
                         <li>
                        <iframe width="720" height="405" src="https://www.youtube.com/embed/Hb4Bpcqglp0?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <?php endif ?>
                        
                        <li>
                        <iframe width="720" height="405" src="https://www.youtube.com/embed/qjlUaMc6-YA" frameborder="0" allowfullscreen></iframe>
                        </li>
                        
                        <li>
                        <iframe width="720" height="405" src="https://www.youtube.com/embed/WfTbWIohYxQ" frameborder="0" allowfullscreen></iframe>
                        </li>
                        
						<li>
						 <h4 class="blog-title font-bold letter-xs">Ok so you know how the software works.. now watch this below!</h4>
                          <iframe width="720" height="405" src="https://www.youtube.com/embed/RHHjR4IcI8w?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </li>
                         <li>
                        <iframe width="720" height="405" src="https://www.youtube.com/embed/GWaPqWpPX7U" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <li>
                        <h2>Private Mastermind Classes:</h2>
                        </li>
                        
                        <!--
                         <li>
                          <div class="menu-icon"> <img alt="example image" src="img/img-youtube-play.png"> </div>
                          <div class="menu-text">
                            <h3 class="blog-title font-bold letter-xs"><a href="https://www.youtube.com/watch?v=aFX49DlwVs0">Explanation of DomainerElite (UNLISTED)</a></h3>                          
                            <a class="btn vd_btn vd_bg-green btn-sm" href="https://www.youtube.com/watch?v=aFX49DlwVs0">Watch Now</a> </div>
                        </li>
                        -->
                        
                         <li>
                         <h4 class="blog-title font-bold letter-xs">Part #1</h4>
                         <div style="width:720px; margin-left:auto; margin-right:auto;" id="members01"></div>
                        <script type='text/javascript'>
                          var so = new SWFObject('player.swf','ply','720','405','9');
  							so.addParam('allowfullscreen','true');
 							so.addParam('allowscriptaccess','always');
 							so.addParam('wmode','transparent');
 							so.addVariable('autostart','false');
 							so.addVariable('image','images/training_part1.png');
 							so.addVariable('file','thelastgoldmine_upsell02_members_video01.mp4');
 							so.addVariable('streamer','rtmp://s1un2c220aj8bs.cloudfront.net/cfx/st/:mp4/thelastgoldmine_upsell02_members_video01.mp4');
 							/*so.addVariable('skin','newtubedark.zip');*/
 							so.addVariable('frontcolor','FFFFFF');
 							so.addVariable('lightcolor','cc9900');
 							so.addVariable('screencolor','FFFFFF');
 							so.addVariable('stretching','fill');
 							so.write('members01');
						</script>
       				 </li>  
       				 
       				  <li>
                        <center><h1><a href="webinars.php">CLICK HERE TO REGISTER<br />FOR THE NEXT LIVE WEBINAR</a></h1></center>
                        </li>
       				 
       				                          <li>
                         <h4 class="blog-title font-bold letter-xs">Part #2</h4>
                         <div style="width:720px; margin-left:auto; margin-right:auto;" id="members02"></div>
                        <script type='text/javascript'>
                          var so = new SWFObject('player.swf','ply','720','405','9');
  							so.addParam('allowfullscreen','true');
 							 so.addParam('allowscriptaccess','always');
							  so.addParam('wmode','transparent');
							  so.addVariable('autostart','false');
							  so.addVariable('image','images/training_part2.png');
							  so.addVariable('file','thelastgoldmine_upsell02_members_video02.mp4');
								so.addVariable('streamer','rtmp://s1un2c220aj8bs.cloudfront.net/cfx/st/:mp4/thelastgoldmine_upsell02_members_video02.mp4');
 							/* so.addVariable('skin','newtubedark.zip');*/
  							so.addVariable('frontcolor','FFFFFF');
							  so.addVariable('lightcolor','cc9900');
							  so.addVariable('screencolor','FFFFFF');
							  so.addVariable('stretching','fill');
							  so.write('members02');
						</script>
       				 </li>  
       				  <li>
                        <center><h1><a href="webinars.php">CLICK HERE TO REGISTER<br />FOR THE NEXT LIVE WEBINAR</a></h1></center>
                        </li>
       				 
       				                          <li>
                         <h4 class="blog-title font-bold letter-xs">Part #3</h4>
                         <div style="width:720px; margin-left:auto; margin-right:auto;" id="members03"></div>
                        <script type='text/javascript'>
                          var so = new SWFObject('player.swf','ply','720','405','9');
  							  var so = new SWFObject('player.swf','ply','748','422','9');
  							so.addParam('allowfullscreen','true');
  							so.addParam('allowscriptaccess','always');
							so.addParam('wmode','transparent');
							so.addVariable('autostart','false');
							so.addVariable('image','images/training_part3.png');
							so.addVariable('file','thelastgoldmine_upsell02_members_video03.mp4');
							so.addVariable('streamer','rtmp://s1un2c220aj8bs.cloudfront.net/cfx/st/:mp4/thelastgoldmine_upsell02_members_video03.mp4');
							/*so.addVariable('skin','newtubedark.zip');*/
							so.addVariable('frontcolor','FFFFFF');
							so.addVariable('lightcolor','cc9900');
							so.addVariable('screencolor','FFFFFF');
							so.addVariable('stretching','fill');
							so.write('members03');
						</script>
       				 </li>  
       				  <li>
                        <center><h1><a href="webinars.php">CLICK HERE TO REGISTER<br />FOR THE NEXT LIVE WEBINAR</a></h1></center>
                        </li>
       				 
       				                          <li>
                         <h4 class="blog-title font-bold letter-xs">Part #4</h4>
                         <div style="width:720px; margin-left:auto; margin-right:auto;" id="members04"></div>
                        <script type='text/javascript'>
                          var so = new SWFObject('player.swf','ply','720','405','9');
  							so.addParam('allowfullscreen','true');
  							so.addParam('allowscriptaccess','always');
 							 so.addParam('wmode','transparent');
							  so.addVariable('autostart','false');
 							 so.addVariable('image','images/training_part4.png');
 							 so.addVariable('file','thelastgoldmine_upsell02_members_video04.mp4');
 							 so.addVariable('streamer','rtmp://s1un2c220aj8bs.cloudfront.net/cfx/st/:mp4/thelastgoldmine_upsell02_members_video04.mp4');
  							/*so.addVariable('skin','newtubedark.zip');*/
 							 so.addVariable('frontcolor','FFFFFF');
  							so.addVariable('lightcolor','cc9900');
  							so.addVariable('screencolor','FFFFFF');
 							 so.addVariable('stretching','fill');
  							so.write('members04');
						</script>
       				 </li>  
       				  <li>
                        <center><h1><a href="webinars.php">CLICK HERE TO REGISTER<br />FOR THE NEXT LIVE WEBINAR</a></h1></center>
                        </li>
       				               
                       
                        
                        
                        
                        <!--
                        
                         <li>
                        <h2>Jamie Lewis public (famous) videos:</h2>
                        </li>
                        
                        
                        <li>
                          <div class="menu-icon"> <img alt="example image" src="img/img-youtube-play.png"> </div>
                          <div class="menu-text">
                            <h3 class="blog-title font-bold letter-xs"><a href="https://www.youtube.com/watch?v=PPUi1gGff9Q">Domaining the old fashioned way (EEK!)</a></h3>                          
                            <a class="btn vd_btn vd_bg-green btn-sm" href="https://www.youtube.com/watch?v=PPUi1gGff9Q">Watch Now</a> </div>
                        </li>
                        
                        <li>
                          <div class="menu-icon"> <img alt="example image" src="img/img-youtube-play.png"> </div>
                          <div class="menu-text">
                            <h3 class="blog-title font-bold letter-xs"><a href="https://www.youtube.com/watch?v=7EHavLBjeZQ">Brand names!</a></h3>                          
                            <a class="btn vd_btn vd_bg-green btn-sm" href="https://www.youtube.com/watch?v=7EHavLBjeZQ">Watch Now</a> </div>
                        </li>
                        -->
                      </ul>
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
