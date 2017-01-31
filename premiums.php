<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <title>SELL DOMAINS WITH DOMAINERELITE</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.0.2/css/hover-min.css"></link>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'></link>
    </head>

    <style>

        body{
            background-color:#03A9F4;
            font-family: 'Montserrat', sans-serif;
        }

        .header{
            padding-top: 10px;
        }

        .header h2 {
            background: #0092d4;
            padding: 30px 15px;
            text-transform: uppercase;
            font-weight: bold;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.15);
            line-height: 1.3;
        }

        .small-links {
            font-size: 16px;
            background: #fff;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            padding: 20px 0;
            line-height: 1;
            margin: 0 0 25px 0;
            border-left: 5px solid #dee3ff;
        }

        .small-links a {
            word-wrap: break-word;
            word-break: break-all;
        }

        .small-links .price {
            font-weight: bold;
            text-align: right;
        }

        .links{
            padding-top: 25px;
        }

        .small-links {
            display: block;
        }

        .strong-links {
            font-weight: bold;
            font-size: 20px;
            background: #fff;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            padding: 20px 0;
            margin: 0 0 20px 0;
            border-right: 5px solid #FA4E00;
            display: block;
        }

        .strong-links .tile-info {
            display: inline-block;
            float: left;
        }

        .strong-links a {
            display:block;
            word-wrap: break-word;
            word-break: break-all;
        }

        .footer-text{
            padding-top: 20px;
            padding-bottom: 25px;
        }
    </style>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center header">
                    <img src="img/logo.png" alt="" width="99" height="59" border="0" />
                    <h2>70% or more off our premium domains</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 text-left links">
                    <?php
                    $domainArrBold = ["castlevania.org", "freephonesystem.com", "pccomputer.org", "slimmingpills.org", "favoriteautostore.com", "within10days.com", "viewmywife.com", "shoppingbestprice.com", "moneydrawing.com", "assetschedule.com", "unlimitedinstantvideos.com", "serverbackupsystem.com", "hookers.io", "usbmodem.net", "gnieb.com", "pleasetag.com"];
                    $BoldDomainPrices = [7800, 4700, 4500, 3700, 2600, 2400, 2300, 2300, 2200, 2200, 2200, 2200, 2100, 2000, 2000, 2000];

                    $counter = 0;
                    foreach ($domainArrBold as $key => $value) {
                        echo "<div class='strong-links hvr-grow row'>"
                        . "<div class='col-sm-3 hidden-xs'><img class='img-responsive ' src='http://domainerelite.com/img/fire-flames.png' height='50px' width='50px'></div> <div class='col-sm-9'>"
                        . "  <div class='tile-info'>"
                        . "<a target='_blank' href='https://uk.godaddy.com/domains/searchresults.aspx?checkAvail=1&tmskey=&domainToCheck=" . $value . "'>" . $value . " </a><span class='price'> worth  $" . $BoldDomainPrices[$counter] . "</span></div> </div></div>";
                        $counter++;
                    }
                    ?>
                </div>
                <div class="col-md-4 links">
                   
                    <?php
                    //Less than 2000 domain names go in $normalDomains with prices 
                    $normalDomains = ["removespyware.org", "moviesporn.org", "violentfights.com", "adderallbuy.com", "bestonlineschooling.com", "knockhimout.com", "refinancingmortage.com", "regcleaner.org", "vehicleloancalculator.com", "24kgoldbracelets.com", "musiclicense.org", "nuty.info", "retardedpoliceman.com", "stocksfordummies.com", "2000hits.com", "atms.info", "onlinemarketingforums.com", "wirelessrouter.us", "spokesmodel.org", "bannerads.io", "crazyshit.org", "doomsdayvault.com", "ecommercemarketing.org", "hotporno.org", "marketingseminar.org", "peoplelivingwithhiv.com", "sexybutt.org", "sitemasters.org", "steamer.biz", "builddreamhouse.com", "causesofsleepapnea.com", "homelendingsolutions.com", "infamouscheats.com"];
                    $normalDomainsPrices = [1900, 1900, 1900, 1800, 1800, 1800, 1800, 1800, 1800, 1700, 1700, 1700, 1700, 1700, 1600, 1600, 1600, 1600, 1600, 1400, 1400, 1400, 1400, 1400, 1400, 1400, 1400, 1400, 1400, 1300, 1300, 1300, 1300,];
                    $counter = 0;
                    foreach ($normalDomains as $key => $value) {
                        echo "<div class='small-links hvr-grow row'><div class='col-sm-8'><a href='https://uk.godaddy.com/domains/searchresults.aspx?checkAvail=1&tmskey=&domainToCheck=" . $value . "'> " . $value . "</a></div> <div class='price col-sm-4'> worth $" . $normalDomainsPrices[$counter] . "</div></div>";
                        $counter++;
                    }
                    ?>
                </div>
                <div class="col-md-4 links">
                    <?php
                    //Less than 2000 domain names go in $normalDomains with prices 
                    $normalDomains2 = ["locketsforwomen.com", "marketingebooks.org", "buyingoilfutures.com", "fannypackholster.com", "hugelibrary.com", "schizophrenic.info", "callconsultant.com", "goodinsurancecompanies.com", "hemorroid.org", "bloodydeath.com", "closestbusiness.com", "sexfurniture.org", "voyeurchats.com", "redneckhillbilly.com", "fatsex.org", "backedsecurities.com", "abusiverelationshiphelp.com", "bestseobook.com", "shippingaddresslabels.com", "tipspacaran.com", "horrorthrillers.com", "roadragevideos.com", "recipesforpets.com", "locateaplace.com", "streamsincome.com", "customizedblogs.com", "howtobeselfsufficient.com", "onlineguitarclasses.com", "traveldisabled.com", "stratguitars.com", "faqhelp.com", "loantobuyland.com", "electronicgunsafes.com", "diagnosticscantools.com"];
                    $normalDomainsPrices2 = [ 1300, 1300, 1200, 1200, 1200, 1200, 1100, 1100, 1100, 1000, 1000, 1000, 1000, 1000, 980, 970, 960, 960, 960, 960, 950, 950, 930, 930, 920, 890, 870, 860, 850, 810, 790, 780, 760, 720];
                    $counter = 0;
                    foreach ($normalDomains2 as $key => $value) {
                        echo "<div class='small-links hvr-grow row'><div class='col-sm-8'>"
                        . "<a href='https://uk.godaddy.com/domains/searchresults.aspx?checkAvail=1&tmskey=&domainToCheck=" . $value . "'> " . $value . "</a>"
                        . "</div>"
                        . "<div class='price col-sm-4'> worth $" . $normalDomainsPrices2[$counter] . "</div>"
                        . "</div>";
                        $counter++;
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 text-center footer-text">
                    <div align="center">
                        Champ Entertainment, Inc <br />
                        PO Box 4084, Monroe CT 06468<br />
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>