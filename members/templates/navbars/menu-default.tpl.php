 <ul>
    <li>
    	<a href="index.php">
        	<span class="menu-icon"><i class="fa fa-home"></i></span> 
            <span class="menu-text">Home</span>  
       	</a>
    </li>  
      <li>
    	<a href="software1.php">
        	<span class="menu-icon"><i class="glyphicon glyphicon-floppy-disk"></i></span> 
            <span class="menu-text">PRO Software</span><br />  
            <span class="badge vd_bg-red"><i class="fa fa-star"></i></span>
       	</a> 
    </li> 
    
    <li>
    	<a href="instructionspro.php">
        	<span class="menu-icon"><i class="fa fa-info-circle"></i></span> 
            <span class="menu-text">PRO Instructions</span><br />  
            <span class="badge vd_bg-red"><i class="fa fa-star"></i></span>
       	</a> 
    </li>
    
     
 	<li>
    	<a href="software.php">
        	<span class="menu-icon"><i class="fa fa-floppy-o"></i></span> 
            <span class="menu-text">LITE Software</span>  
       	</a> 
    </li>   
    
    <?php if (strtotime($_SESSION['free_webinar_start_time']) > time()): ?>
    <li>
    	<a href="<?php echo $_SESSION['free_webinar_url']; ?>">
        	<span class="menu-icon"><i class="fa fa-gift"></i></span> 
            <span class="menu-text"><strong>FREE Webinar</strong><br /> <small><?php echo date('D M jS, Y h:i a', strtotime($_SESSION['free_webinar_start_time'])); ?> EST</small> </span>  
       	</a> 
    </li>   
    <?php endif ?>
    
        <?php if ($_SESSION['ultimate_download'] == 'Y'): ?>
    <li>
    	<a href="ultimatedownload">
        	<span class="menu-icon"><i class="fa fa-cloud-download"></i></span> 
            <span class="menu-text">Ultimate Download</span>  
       	</a> 
    </li>   
    <?php endif ?>
   
    <li>
    	<a href="marketplace.php">
        	<span class="menu-icon"><i class="fa fa-shopping-cart"></i></span> 
            <span class="menu-text">Marketplace</span>  
       	</a> 
    </li>   

    <li>
    	<a href="webinars.php">
        	<span class="menu-icon entypo-icon"><i class="fa fa-graduation-cap"> </i></span> 
            <span class="menu-text">Webinars</span>  
       	</a>
    </li>   
    

    <li>
    	<a href="recipe.pdf">
        	<span class="menu-icon"><i class="fa fa-book"></i></span> 
            <span class="menu-text">Domainer Recipe</span>  
       	</a> 
    </li>   
    
    <li>
    	<a href="assistance.php">
        	<span class="menu-icon"><i class="fa fa-briefcase "></i></span> 
            <span class="menu-text">Assistance (Auction Listings)</span>  
       	</a> 
    </li>   

    <li>
    	<a href="words.zip">
        	<span class="menu-icon"><i class="fa fa-file-word-o"></i></span> 
            <span class="menu-text">Word List</span>  
       	</a> 
    </li>      
    <li>
    	<a href="1500nouns.zip">
        	<span class="menu-icon"><i class="fa fa-file-word-o"></i></span> 
            <span class="menu-text">1500 Nouns List</span>  
       	</a> 
    </li>        
    <li>
    	<a href="resources.php">
        	<span class="menu-icon"><i class="fa fa-lightbulb-o"> </i></span> 
            <span class="menu-text">Resources</span>  
       	</a>
    </li> 

    
    <li>
    	<a href="http://www.anrdoezrs.net/click-6072877-10378406-1438892975000" target="_blank">
        	<span class="menu-icon"><i class="fa fa-external-link-square"></i></span> 
            <span class="menu-text">Go Daddy</span>  
       	</a>
    </li> 
    
         <li>
    	<a href="http://www.aweber.com/?307670" target="_blank">
        	<span class="menu-icon"><i class="fa fa-list"></i></span> 
            <span class="menu-text">AWeber</span>  
       	</a>
    </li> 
    
     <li>
    	<a href="http://www.rankpay.com/2320.html" target="_blank">
        	<span class="menu-icon"><i class="fa fa-usd"></i></span> 
            <span class="menu-text">RankPay</span>  
       	</a>
    </li> 
                
    <li>
    	<a href="http://editor.wix.com/html/editor/web/renderer/new?metaSiteId=8e64be00-3fd1-491d-800f-9509eadd08bb&siteId=9e02c429-1e9f-4155-b083-05b3988ad94e&editorSessionId=E0C9913A-06B2-4B5D-803E-CD734EF2F0D0" target="_blank">
        	<span class="menu-icon"><i class="fa fa-sitemap"></i></span> 
            <span class="menu-text">Sites</span>  
       	</a>
    </li>    
     <li>
    	<a href="https://pixlr.com/editor/" target="_blank">
        	<span class="menu-icon"><i class="fa fa-picture-o"></i></span> 
            <span class="menu-text">Graphics</span>  
       	</a>
    </li> 
     <li>
    	<a href="http://www.escrow.com/" target="_blank">
        	<span class="menu-icon"><i class="fa fa-money"></i></span> 
            <span class="menu-text">Escrow</span>  
       	</a>
    </li> 
    <li>
    	<a href="http://paypal.com/" target="_blank">
        	<span class="menu-icon"><i class="fa fa-cc-paypal"></i></span> 
            <span class="menu-text">Paypal</span>  
       	</a>
    </li> 
    <li>
    	<a href="https://flippa.com/sell" target="_blank">
        	<span class="menu-icon"><i class="fa fa-exchange"></i></span> 
            <span class="menu-text">Flippa</span>  
       	</a>
    </li> 
    <li>
    	<a href="https://archive.org/web/" target="_blank">
        	<span class="menu-icon"><i class="fa fa-history"></i></span> 
            <span class="menu-text">Wayback Machine</span>  
       	</a>
    </li> 
    
   
	    <li>
    	<a href="mailto:specialprojectwithjamie@gmail.com">
            <span class="menu-icon"><i class="fa fa-envelope"> </i></span>
            <span class="menu-text">Contact</span>
        </a>
    </li>
                 
</ul>
<!-- Head menu search form ends --> 