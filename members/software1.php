<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require_once('templates/headers/opening.tpl.php'); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Domainer Elite</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
</head>

<body>
    <div id="content">
        <header class="row-1">
            <div class="container">
                <img id = "headerimg" src="img/header.png" alt="Domainer Elite Header" class="row-12 col-12" />
            </div>
        </header>

        <main class="row-9">
            <div class="row row-10">
                <div class="row-10 col-2">
                    <div>
                         <ul>
                            <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                            <li><a href="software.php"><i class="fa fa-floppy-o"></i>Software</a></li>
                            <li><a href="recipe.pdf"><i class="fa fa-book"></i>Domainer Recipe</a> </li>   
                            <li><a href="assistance.php"><i class="fa fa-briefcase "></i>Assistance (Auction Listings)</a></li>
                            <li><a href="words.zip"><i class="fa fa-file-word-o"></i>Word List</a></li>      
                            <li><a href="1500nouns.zip"><i class="fa fa-file-word-o"></i>1500 Nouns List</a></li>
                            <li><a href="resources.php"><i class="fa fa-lightbulb-o"> </i>Resources</a></li> 
                            <li><a href="webinars.php"><span class="menu-icon entypo-icon"><i class="fa fa-graduation-cap"></i>Webinars</a></li>
                            <li><a href="http://www.anrdoezrs.net/click-6072877-10378406-1438892975000" target="_blank"><i class="fa fa-external-link-square"></i>Go Daddy</a></li> 
                            <li><a href="http://www.aweber.com/?307670" target="_blank"><i class="fa fa-list"></i>AWeber</a></li>
                            <li><a href="http://www.rankpay.com/2320.html" target="_blank"><i class="fa fa-usd"></i>RankPay</a></li> 
                            <li><a href="http://editor.wix.com/html/editor/web/renderer/new?metaSiteId=8e64be00-3fd1-491d-800f-9509eadd08bb&siteId=9e02c429-1e9f-4155-b083-05b3988ad94e&editorSessionId=E0C9913A-06B2-4B5D-803E-CD734EF2F0D0" target="_blank"><i class="fa fa-sitemap"></i>Sites</a></li>    
                            <li><a href="https://pixlr.com/editor/" target="_blank"><i class="fa fa-picture-o"></i>Graphics</a></li> 
                            <li><a href="http://www.escrow.com/" target="_blank"><i class="fa fa-money"></i>Escrow</a></li> 
                            <li><a href="http://paypal.com/" target="_blank"><i class="fa fa-cc-paypal"></i>Paypal</a></li> 
                            <li><a href="https://flippa.com/sell" target="_blank"><i class="fa fa-exchange"></i>Flippa</a></li> 
                            <li><a href="https://archive.org/web/" target="_blank"><i class="fa fa-history"></i>Wayback Machine</a></li> 
                            <li><a href="mailto:specialprojectwithjamie@gmail.com"><i class="fa fa-envelope"> </i></span>Contact</span></a></li>
                        </ul>
                        <!-- Head menu search form ends --> 
                    </div>

                    <div>
                        <ul>
                            <li><a href="membercontrol/logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>

    			<div class="row-10 col-8">
                    <div class="container row-4">
                        <iframe id="video" src="https://www.youtube.com/embed/jlEk2g7eAYU?rel=0&modestbranding=1"></iframe>
                    </div>

                    <div class="row row-8">
                        <div class="col-6">
                            <div class="row-4">
                                <p class="group-name">Domains</p>
                                <div class="group row-10">
                                    <div class="radiocontainer">
                                        <input type="radio" name="domain" id="expireddomains">
                                        <label for="expireddomains"><span class="radio">Expired Domains</span></label>
                                    </div>
                                    <div class="radiocontainer">
                                        <input type="radio" name="domain" id="jamiesdomains">
                                        <label for="jamiesdomains"><span class="radio">Jaime's Domains</span></label>
                                    </div>
                                    <div class="radiocontainer">
                                        <input type="radio" name="domain" id="dicdomains">
                                        <label for="dicdomains"><span class="radio">Dictionary Domains</span></label>
                                    </div>
                                    <button class="button">Submit</button>
                                </div>
                            </div>

                            <div id="keywords" class="row-8">
                                <p class="group-name">Search Domains</p>
                                <div class="group row-10">
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

                                    <div class="row">
                                        <div class="col-6" style="align-content: center;">
                                            <button class="button">Search</button>
                                        </div>
                                        <div class="col-6" style="align-content: center;">
                                            <button class="button">Add Keyword</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div id="result" class="col-6">
                            <p class="group-name">Available Domains</p>
                            <div id="available" class="menu group row-11">
                                <ul>
                                    <li>intensecars.com<button class="myButton">Register</button><button class="myButton">Appraise</button></li>
                                    <li>passivecars.com<button class="myButton">Register</button><button class="myButton">Appraise</button></li>
                                    <li>howtodocars.com<button class="myButton">Register</button><button class="myButton">Appraise</button></li>
                                    <li>howtolearncars.com<button class="myButton">Register</button><button class="myButton">Appraise</button></li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>                                     
                </div>

                <div class="row-10 col-2 aside">
                    <a href="https://flippa.com/" target="_blank" class="linkbutton">Flippa</a>
                    <a href="https://sedo.com/us/" target="_blank" class="linkbutton">Sedo</a>
                    <a href="http://morganlinton.com/top-ten-places-to-sell-your-domain-names/" target="_blank" class="linkbutton">Morganlinton</a>
                    <a href="http://www.godaddy.com/" target="_blank" class="linkbutton">GoDaddy</a>
                    <a href="https://www.freemarket.com/" target="_blank" class="linkbutton">Freemarket</a>
                    <a href="http://www.domainsherpa.com/sell-at-marketplaces/" target="_blank" class="linkbutton">Domainsherpa</a>
                    <a href="http://www.websitebroker.com/" target="_blank" class="linkbutton">Websitebroker</a>
                    <a href="http://www.hongkiat.com/blog/selling-domain-names/" target="_blank" class="linkbutton">Hongkiat</a>
                    <a href="https://www.quora.com/What-are-some-good-reputable-resources-for-selling-domains" target="_blank" class="linkbutton">Quora</a>
                    <a href="http://www.pcnames.com/articles/an-introduction-to-buying-and-selling-domain-names" target="_blank" class="linkbutton">Pcnames</a>
                </div>
            </div>

        </main>
    </div>
</body>
</html>