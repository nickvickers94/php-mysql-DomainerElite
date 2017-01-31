<?php include 'membercontrol/auth.php'; ?>
<?php 
	if ($_SESSION['software'] == 'N') {
		header("Location: http://www.domainerelite.com/us1.php"); 
		exit;
	}
?>
<?php 
require_once("includes/conn.php");
$row = "";
$result = $conn->query("SELECT * FROM domains LIMIT 1");
if($result->num_rows>0){
	$row = $result->fetch_array(MYSQLI_BOTH);		
}
$domain_keywords = explode(",",$row["domains_keywords"]);
$start_keywords = explode(",",$row["start_keywords"]);
$end_keywords = explode(",",$row["end_keywords"]);
$extentions = explode(",",$row["extentions"]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Domainer Elite</title>
    <link href="css/music_player.css" rel="stylesheet" type="text/css" />
    <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
    <style>
        #gbar,
        #guser {
            font-size: 13px;
            padding-top: 1px !important;
        }
        #gbar {
            height: 22px
        }
        #guser {
            padding-bottom: 7px !important;
            text-align: right
        }
        .gbh,
        .gbd {
            border-top: 1px solid #c9d7f1;
            font-size: 1px
        }
        .gbh {
            height: 0;
            position: absolute;
            top: 24px;
            width: 100%
        }
        @media all {
            .gb1 {
                height: 22px;
                margin-right: .5em;
                vertical-align: top
            }
            #gbar {
                float: left
            }
        }
        a.gb1,
        a.gb4 {
            text-decoration: underline !important
        }
        a.gb1,
        a.gb4 {
            color: #fff !important
        }
    </style>
    <style>
        .j {
            width: 34em
        }
        #mn {
            width: 996px
        }
        #fll a {
            margin: 0 10px
        }
        #bfl a {
            margin: 0 10px
        }
        .lsb {
            background: url(/images/nav_logo_hp2.png) no-repeat;
            overflow: hidden
        }
        .micon {
            background: url(/images/nav_logo_hp2.png) no-repeat;
            overflow: hidden
        }
        .csb {
            background: url(/images/nav_logo_hp2.png) no-repeat;
            overflow: hidden
        }
        .star {
            background: url(/images/nav_logo_hp2.png) no-repeat;
            overflow: hidden
        }
        .star div {
            background: url(/images/nav_logo_hp2.png) no-repeat;
            overflow: hidden
        }
        .star {
            background-position: 0 -120px
        }
        .star div {
            background-position: 0 -110px
        }
        .p {
            font-family: arial, sans-serif
        }
        .gsfi {
            font-size: 17px
        }
        .gsfs {
            font-size: 17px
        }
        .w {
            color: #fff
        }
        .q:active {
            color: #fff
        }
        .q:visited {
            color: #fff
        }
        .tbotu {
            color: #fff
        }
        .hd {
            height: 1px;
            position: absolute;
            top: -1000em
        }
        .std {
            font-size: 13px
        }
        .f {
            color: #fff
        }
        .grn {
            color: #393
        }
        .ds {
            border-right: 1px solid #e7e7e7;
            position: relative;
            height: 32px;
            z-index: 100
        }
        .e {
            margin: 2px 0px 0.75em
        }
        .lnsec {
            font-size: 13px;
            border-top: 1px solid #c9d7f1;
            margin-top: 5px;
            padding-top: 8px;
            padding-left: 8px
        }
        .lst {
            background: #fff;
            border: 1px solid #ccc;
            border-bottom: none;
            color: #000;
            font: 18px arial, sans-serif;
            float: left;
            height: 26px;
            margin: 0;
            padding: 4px 0 0;
            padding-left: 6px;
            padding-right: 10px;
            vertical-align: top;
            width: 100%;
            word-break: break-all
        }
        .lst:focus {
            outline: none
        }
        .lst-td {
            border-bottom: 1px solid #999;
            padding: 0
        }
        .lst-b {
            border: 1px solid #CCC;
            border-bottom: none;
            padding-right: 0;
            height: 29px;
            padding-top: 1px
        }
        .tia {
            padding-right: 0
        }
        .lsbb {
            background: #eee;
            border: 1px solid #999;
            border-top-color: #ccc;
            border-left-color: #ccc;
            height: 30px
        }
        .lsb {
            background-position: bottom;
            border: none;
            color: #000;
            cursor: pointer;
            font: 15px arial, sans-serif;
            height: 30px;
            margin: 0;
            vertical-align: top
        }
        .lsb:active {
            background: #ccc
        }
        .micon {
            float: left;
            height: 19px;
            margin-top: 2px;
            margin-right: 6px;
            width: 19px
        }
        .nobr {
            white-space: nowrap
        }
        .ts {
            border-collapse: collapse
        }
        .mitem {
            font-size: 15px;
            line-height: 24px;
            margin-bottom: 2px;
            padding-left: 8px
        }
        .msel {
            font-weight: bold;
            margin: -1px 0 0 0;
            border: solid #fff;
            border-width: 1px 0
        }
        .r {
            margin: 0
        }
        .spon {
            font-size: 11px;
            font-weight: normal;
            color: #767676
        }
        .csb {
            display: block;
            height: 40px
        }
        .taf {
            padding: 1px 0 0
        }
        .tam {
            padding: 14px 0 0
        }
        .tal {
            padding: 14px 0 1px
        }
        .tbfo {
            margin-bottom: 8px
        }
        .tbt {
            margin-bottom: 8px
        }
        .tbpd {
            margin-bottom: 8px
        }
        .tbos {
            font-weight: bold
        }
        .b {
            font-weight: bold
        }
        .gac_wd {
            overflow: hidden;
            right: -2px !important
        }
        .fmg {
            display: inline-block;
            margin-top: 7px;
            padding-right: 8px;
            text-align: left;
            vertical-align: top;
            width: 90px;
            zoom: 1
        }
        .star {
            height: 9px;
            overflow: hidden;
            width: 50px
        }
        .pslires {
            padding-top: 6px;
            overflow: hidden;
            width: 99.5%
        }
        .psliimg {
            float: left;
            height: 90px;
            text-align: top;
            width: 90px
        }
        .pslimain {
            margin-left: 100px;
            margin-right: 9em
        }
        .psliprice {
            float: right;
            width: 7em
        }
        body {
            font-family: arial, sans-serif;
            margin: 0;
            font-size: 13px
        }
        td {
            font-family: arial, sans-serif
        }
        div {
            font-family: arial, sans-serif
        }
        a {
            font-family: arial, sans-serif
        }
        .gssb_c table {
            font-size: 1em
        }
        a:link {
            color: #fff
        }
        a.fl {
            color: #4272db;
            text-decoration: none
        }
        .flc a {
            color: #4272db;
            text-decoration: none
        }
        a.gl {
            text-decoration: none
        }
        .ads a:link {
            color: #0E1CB3
        }
        cite {
            color: #0E774A;
            font-style: normal
        }
        h3 {
            font-size: 16px;
            font-weight: normal;
            margin: 0;
            padding: 0
        }
        li.g {
            font-size: 13px;
            margin-bottom: 14px;
            margin-top: 0;
            zoom: 1
        }
        html {
            font-size: 13px
        }
        table {
            font-size: 13px
        }
        h1 {
            margin: 0;
            padding: 0
        }
        ol {
            margin: 0;
            padding: 0
        }
        ul {
            margin: 0;
            padding: 0
        }
        li {
            margin: 0;
            padding: 0
        }
        .slk a {
            text-decoration: none
        }
        .tia input {
            border-right: none;
            padding-right: 0
        }
        .s br {
            display: none
        }
        .images_table td {
            line-height: 17px;
            padding-bottom: 16px
        }
        .images_table img {
            border: 1px solid #ccc;
            padding: 1px
        }
        a:hover {
            text-decoration: underline
        }
        em {
            font-weight: bold;
            font-style: normal
        }
        .psliprice b {
            font-size: medium;
            font-weight: bold;
            white-space: nowrap
        }
        .psliimg img {
            border: none
        }
        cite a:link {
            color: #0E774A;
            font-style: normal
        }
        ol li {
            list-style: none
        }
        ul li {
            list-style: none
        }
        #gbar {
            float: left;
            height: 22px;
            padding-left: 2px;
            font-size: 13px
        }
        #foot {
            padding: 0 8px
        }
        #center_col {
            border-left: 1px solid #d3e1f9;
            padding: 0 8px
        }
        #logo {
            display: block;
            height: 49px;
            margin-top: 12px;
            margin-left: 12px;
            overflow: hidden;
            position: relative;
            width: 137px
        }
        #nav {
            border-collapse: collapse;
            margin-top: 17px;
            text-align: left
        }
        #showmodes .micon {
            background-position: -150px -114px;
            height: 17px;
            margin-left: 9px;
            width: 17px
        }
        #subform_ctrl {
            font-size: 11px;
            height: 26px;
            margin: 5px 3px 0;
            margin-left: 17px
        }
        #mn {
            table-layout: fixed
        }
        #res {
            padding: 4px 8px 0
        }
        #showmodes {
            font-size: 15px;
            line-height: 24px
        }
        #swr {
            margin-top: 4px
        }
        #tbd {
            display: block;
            min-height: 1px;
            padding-top: 3px
        }
        #abd {
            display: block;
            min-height: 1px;
            padding-top: 3px
        }
        #foot a {
            white-space: nowrap
        }
        #res h3 {
            display: inline
        }
        #mbEnd li {
            margin: 1em 0
        }
        #mbEnd h2 {
            color: #676767;
            font-family: arial, sans-serif;
            font-size: 11px;
            font-weight: normal
        }
        #leftnav a {
            text-decoration: none
        }
        #leftnav h2 {
            color: #767676;
            font-weight: normal;
            margin: 0
        }
        #logo img {
            left: 0;
            position: absolute;
            top: -41px
        }
        #nav td {
            text-align: center
        }
        #swr li {
            line-height: 1.2;
            margin-bottom: 4px
        }
        #tbd li {
            display: inline
        }
        #tbd .tbt li {
            display: block;
            font-size: 13px;
            line-height: 1.2;
            padding-bottom: 3px;
            padding-left: 8px;
            text-indent: -8px
        }
        #leftnav a:hover {
            text-decoration: underline
        }
        #lnkdomain1 {
            cursor: pointer;
        }
        #search_results_clickbank a {
            color: #000 !important;
        }
        #search_results_clickbank a:hover {
            color: #0974C6 !important;
        }
        body {
            background-color: #141414;
        }
    </style>
    <style type="text/css">
        #search_results_clickbank a,
        #results b,
        a#lnkLinks,
        a#lnkdomain,
        a#lnkdomain1,
        #submitalink {
            color: #0974C6;
            font-size: 12px;
            javascript font-weight: bold;
        }
        #search_results_clickbank {
            font-family: helvetica, arial;
            font-size: 12px;
            height: 155px;
            overflow: auto;
            padding: 5px;
            width: 275px;
            overflow: auto;
            border: 1
        }
        #submitalink input,
        #web_des {
            width: 250px;
        }
        #submitalink label {
            width: 200px;
        }
        body {
            font-family: helvetica, arial;
            font-size: 12px;
        }
        #txtcontents {
            height: 100px;
            border: 0;
            background: none;
        }
        #slinks {
            font-size: 10px;
            padding-top: 35px;
        }
        #slinks input {
            margin-right: 2px;
        }
        .bluegrid {
            background-color: transparent;
            border: medium none;
            color: #FFFFFF;
            font-size: 11px;
            width: 95px;
            padding: 6px 3px 2px 2px;
            line-height: normal;
            border: 0;
        }
        .table.chart tr.barvrow td {
            width: 40px;
            height: 400px;
            vertical-align: bottom;
            border-bottom-color: red;
            border-bottom-style: solid;
            text-align: center;
        }
        .table.chart tr.bartrow td {
            text-align: center
        }
        label {
            color: #fff !important;
        }
    </style>
</head>

<body>
<h1 style="text-align: center; color: red;">Now that you have the software you <u>DO NOT need an Estibot account</u></h1>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" valign="top">
                <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="1000" align="left" valign="top" class="main_bg">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td height="29" align="left" valign="middle">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="right" valign="middle">
                                                    <a href="#"><img src="images/minimize.jpg" />
                                                    </a>
                                                    <a href="#"><img src="images/maximize.jpg" />
                                                    </a>
                                                    <a href="#"><img src="images/close.jpg" />
                                                    </a>
                                                </td>
                                                <td width="13" align="right" valign="middle">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="187" rowspan="2" align="center" valign="top">
                                                    <table width="86%" border="0" cellspacing="0" cellpadding="0" id="newdesign">

                                                        <tr>
                                                            <td width="4" align="center" valign="bottom"></td>
                                                            <td height="30" align="center" valign="bottom">
                                                                <a href="#"><img src="images/volume.jpg" />
                                                                </a> &nbsp;
                                                                <a href="#"><img src="images/volume2.jpg" />
                                                                </a> &nbsp;
                                                                <a href="#"><img src="images/volume_red_dot.jpg" />
                                                                </a>
                                                                <a href="#"><img src="images/volume_blue_dot.jpg" />
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="bottom"></td>
                                                            <td height="294">
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>


                                                                        <!--Point-->




                                                                        <td align="right" height="294" valign="bottom">
                                                                            <input name="button" type="image" id="estibot_pop" value="http://www.estibot.com/" src="images/submit_btn.png" /><br />
                                                                            <span style="color: #fff; font-weight: bold">Appraise Here</span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td height="314" align="center" valign="middle" id="tdLinks" style="background:url(images/googlelogo.png) center center no-repeat;    background-size: contain;">
                                                    <table width="744" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td valign="top" align="left" style="padding-top:0px">
                                                                <div id="dvweblinks" style="height:300px;width:750px;overflow:hidden">
                                                                    <iframe src="https://www.youtube.com/embed/jlEk2g7eAYU?rel=0&modestbranding=1" id="i" name="i" width="750px" height="300px" style="border:0px;" ></iframe>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="53" align="center" valign="top">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="352" height="18" align="left" valign="top">
                                                                <table width="352" border="0" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td style="text-align: center; width: 165px;">
                                                                            <select name="domain_extention" id="domain_extention" style="width:125px;">
                                                                            	<?php foreach($extentions as $extention){ ?>
                                                                                	<option value="<?=$extention?>">.<?=$extention?></option> 
                                                                                <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                        <td style="padding-left: 17px;">
                                                                            <select name="filter" id="filter" style="width:125px;">                                                                     
                                                                                <option value="1">By Keyword</option>
                                                                                <option value="2">Starting Words</option>
                                                                                <option value="3">Ending Words</option>
                                                                                <option value="4">Expired Domains</option>
                                                                                <option value="5">Jamie's Domains</option>
                                                                                <option value="6">Dictionary Domains</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="left" valign="bottom">
                                                                <input name="button" type="image" id="reset" value="Submit" onclick="return clear1()" src="images/reset_btn.png" />
                                                                <table width="197" border="0" cellpadding="0" cellspacing="0" style="float:right;">
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                        <td><span id="clickbank_dd"><select name="categoryDropdown" id="categoryDropdown" style="width:140px;"><option value="">Clickbank</option></select></span>
                                                                        </td>
                                                                    </tr>
                                                                </table>


                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="bottom">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td height="253" align="left" valign="top">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="374" height="253" align="left" valign="top">
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td height="27" align="left" valign="top">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="left" valign="top">
                                                                            <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td align="left" valign="top" width="100%" style="background:url(images/godaddy.png) 9px center no-repeat;">
                                                                                        <div id="mcs_container">
                                                                                            <div class="customScrollBox">
                                                                                                <div class="container" style="">
                                                                                                    <div class="content">
                                                                                                        <table border="0" width="100%">
                                                                                                            <tr>
                                                                                                                <td align="left" class="search_results_clickbank" ><a href="#" style="color:blue;">Potential Domains with Appraisals</a>
                                                                                                                </td>
                                                                                                                <td class="search_results_clickbank" width="25%">
                                                                                                                    <!--<a href="javascript:void();" id="lnkLinks" class="search_results_clickbank">View Links</a>-->
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <div id="loading" style="display:none;position:relative">Please wait...</div>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td colspan="3">
                                                                                                                    <div id="frmDomain" style="display:block;height:170px;overflow:auto">
                                                                                                                        <div id="results" align="left"> </div>
                                                                                                                        <div id="results_loading" align="left"> </div>
                                                                                                                        <div class="available_msg" align="left"> </div>
                                                                                                                        <div class="try_msg" align="left"> </div>
                                                                                                                        
                                                                                                                        
                                                                                                                    </div>
                                                                                                                    <div id="frmLinks" style="display:none;height:170px;overflow:auto">
                                                                                                                        <div id="resultsLinks" style="position:relative;" align="left"> </div>
                                                                                                                    </div>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="dragger_container">
                                                                                                    <div class="dragger ui-draggable" style="display: block; height: 50px; line-height: 50px; top: 0px;"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <a href="#" class="scrollUpBtn"><img src="images/mcs_btnUp.png" height="10" width="10" />
                                                                                            </a>
                                                                                            <a href="#" class="scrollDownBtn"><img src="images/mcs_btnDown.png" height="10" width="10" />
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td width="21" align="center" valign="middle"></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="35" align="center" valign="bottom">
                                                                            <a href="#"><img src="images/prev.jpg" />
                                                                            </a>
                                                                            <a href="#"><img src="images/next.jpg" />
                                                                            </a>
                                                                            <a href="#"><img src="images/pause.jpg" />
                                                                            </a>
                                                                            <a href="#"><img src="images/stop.jpg" />
                                                                            </a>
                                                                            <a href="#"><img src="images/prev.jpg" />
                                                                            </a>
                                                                            <a href="#"><img src="images/record.jpg" />
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center" valign="top">
                                                                <table width="97%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" valign="top">
                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td width="67" align="left" valign="top">
                                                                                        <a href="#" title="Click Here" id="btnplus"><img src="images/plus.jpg" />
                                                                                        </a>
                                                                                        <a href="#" id="btnminus"><img src="images/minus.jpg" />
                                                                                        </a>
                                                                                    </td>
                                                                                    <td align="left" valign="top">
                                                                                        <input type="text" name="search_term" id="search_term" class="text_field_blue" />
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center" valign="top">
                                                                            <table width="208" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td height="184" align="left" valign="top" background="greyFade.png">
                                                                                        <div style="height:184px;overflow:auto;\" id="dvKeywords">
                                                                                            <table width="208" id="list" cellpadding="0" cellspacing="0" style="padding-left:10px;">		
                                                                                            <?php foreach($domain_keywords as $dk){ ?>
                                                                                            
                                                                                                <tr>
                                                                                                    <td valign="top" width="20%"><a id="lnkdomain1" class="search_results_clickbank a">Select</a> </td>
                                                                                                    <td>
                                                                                                        <div><?=strtolower($dk)?></div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                             <?php }  ?>
                                                                                                

                                                                                            </table>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="29" align="center" valign="bottom">
                                                                            <table width="208" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td width="70" align="left" valign="top">&nbsp;</td>
                                                                                    <td align="left" valign="top"><img src="images/volume_point_hov.jpg" /><img src="images/volume_point_hov.jpg" /><img src="images/volume_point_hov.jpg" /><img src="images/volume_point_hov.jpg" /><img src="images/volume_point.jpg" /><img src="images/volume_point.jpg" /><img src="images/volume_point.jpg" /><img src="images/volume_point.jpg" /><img src="images/volume_point.jpg" /><img src="images/volume_point.jpg" /><img src="images/volume_point.jpg" /><img src="images/volume_point.jpg" />
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td width="378" align="left" valign="top">
                                                                <table width="368" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td height="27" align="left" valign="top">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="right" valign="top">
                                                                            <table width="285" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td height="167" align="left" valign="top" background="greyFade.png">
                                                                                        <div id="search_results_clickbank" style="height:155px;width:280px;overflow:auto;border:1;padding-left:0px; background-image:url(images/clickwater.png);"></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="26" align="right" valign="bottom">
                                                                            <table width="306" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td width="18" align="left" valign="top"><img src="images/volume_blue.jpg" />
                                                                                    </td>
                                                                                    <td align="left" valign="middle" class="bullet_gry">
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_red.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/bullet_gry.png" />
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="31" align="right" valign="bottom">
                                                                            <table width="93%" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td align="center" valign="top">
                                                                                        <a href="#"><img src="images/prev.jpg" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/next.jpg" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/pause.jpg" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/stop.jpg" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/prev.jpg" />
                                                                                        </a>
                                                                                        <a href="#"><img src="images/record.jpg" />
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- content to show if javascript is disabled -->
    <noscript>
        <style type="text/css">
            #mcs_container .customScrollBox {
                overflow: auto;
            }
            #mcs_container .dragger_container {
                display: none;
            }
        </style>
    </noscript>
    <script>
        $(window).load(function() {



            mCustomScrollbars();



        });




        function mCustomScrollbars() {



            /* 



	malihu custom scrollbar function parameters: 



	1) scroll type (values: "vertical" or "horizontal")



	2) scroll easing amount (0 for no easing) 



	3) scroll easing type 



	4) extra bottom scrolling space for vertical scroll type only (minimum value: 1)



	5) scrollbar height/width adjustment (values: "auto" or "fixed")



	6) mouse-wheel support (values: "yes" or "no")



	7) scrolling via buttons support (values: "yes" or "no")



	8) buttons scrolling speed (values: 1-20, 1 being the slowest)



	*/



            $("#mcs_container").mCustomScrollbar("vertical", 100, "easeOutCirc", 1.05, "fixed", "yes", "yes", 15);



        }




        /* function to fix the -10000 pixel limit of jquery.animate */



        $.fx.prototype.cur = function() {



            if (this.elem[this.prop] != null && (!this.elem.style || this.elem.style[this.prop] == null)) {



                return this.elem[this.prop];



            }



            var r = parseFloat(jQuery.css(this.elem, this.prop));



            return typeof r == 'undefined' ? 0 : r;



        }




        /* function to load new content dynamically */



        function LoadNewContent(id, file) {



            $("#" + id + " .customScrollBox .content").load(file, function() {



                mCustomScrollbars();



            });



        }
		
		var exact = 0; // check to check if to find exact domain only.
        jQuery(document).ready(function(e) {
			
			 
			
            jQuery(document).on("click",".search_results_clickbank", function() {
                //alert();
				var filter = jQuery("#filter").val();
				if(filter==2){ // to insert first words
					jQuery("#search_term").val(jQuery(this).closest("td").next("td").find("div").html()+" "+jQuery("#search_term").val());	
					exact = 1;
				}else if(filter==3){ // to insert last words
					jQuery("#search_term").val(jQuery("#search_term").val()+" "+jQuery(this).closest("td").next("td").find("div").html());	
					exact = 1;
				}else{
                	jQuery("#search_term").val(jQuery(this).closest("td").next("td").find("div").html());
				}
            });
			
			
			jQuery(document).on("change","#filter",function(){
				var val = jQuery(this).val();
				jQuery("#search_term").val("");
				jQuery(".available_msg").html("");
				jQuery(".try_msg").html("");
				if(val==4 || val==5 || val==6){
					jQuery("#domain_extention").attr("disabled","disabled");	
					exact = 0;
				}else if(val==1){
					exact = 0;	
				}else{
					jQuery("#domain_extention").removeAttr("disabled");	
				}
				
				jQuery("#list").html("<span>Please Wait...</span>");
				jQuery.ajax({
					type:"POST",
					url:"get_list.php",
					data:{"value":val}	
				}).done(function(msg){
					
					jQuery("#list").html(msg);
					
				});
						
				
				
			});

            jQuery("#btnplus").on("click", function(e) {
                e.preventDefault();
				var all_available = 0;
				var try_again = 0;
				var count = 0;
				jQuery(".available_msg").html("");
				jQuery(".try_msg").html("");
                var domain = jQuery("#search_term").val().replace(/ /g, '');
                jQuery("#results_loading").html("<span>Loading...</span>");
				var val = jQuery("#filter").val();
				var check=0;
				if((val==2 || val==3)){		
					jQuery("#list tr").each(function(index, element) {
						
                        if(domain==jQuery(this).find("td").eq(1).attr("data-value").replace(/ /g, '')){
							check =1;
						}
                    });
					
					if(check==0){
						val = 5;	
					}
						
				}		
				if(val==1){ //if keywords is selected
					<?php foreach($start_keywords as $sk){ ?>
					 
					$.ajax({
						url: "process.php",
						type: "POST",
						
						data: {
							"domain": '<?=$sk?>'+domain,
							"extention": jQuery("#domain_extention").val(),
							"option": val,
						}
					}).done(function(msg) {
						//console.log(msg.indexOf("<span style='color:red;'>All other domains are not available</span>"));	
						if(msg.indexOf("<span style='color:red;'>All other domains are not available</span>")>-1){
							jQuery(".available_msg").html(msg);
							
						}
						if(msg.indexOf("Please try again...")>-1){
							//jQuery(".try_msg").html(msg);
						}
						if(msg.indexOf("<span style='color:red;'>All other domains are not available</span>")==-1 && msg.indexOf("Please try again...")==-1){
							if(count==0){
								jQuery("#results").html(msg);
								count = 1;
							}else{
								jQuery("#results").append(msg);
							}
						}
					});
					 
					<?php } ?>
					
					
					<?php $count =0; $size = sizeof($end_keywords); foreach($end_keywords as $ek){ ?>
					$.ajax({
						url: "process.php",
						type: "POST",
						
						data: {
							"domain": domain+'<?=$ek?>',
							"extention": jQuery("#domain_extention").val(),
							"option": val,
						}
					}).done(function(msg) {	
						<?php $count++; if($count==$size){ ?>jQuery("#results_loading").html("");<?php } ?>		
					    //console.log(msg.indexOf("<span style='color:red;'>All other domains are not available</span>"));	
						if(msg.indexOf("<span style='color:red;'>All other domains are not available</span>")>-1){
							jQuery(".available_msg").html(msg);
						}
						if(msg.indexOf("Please try again...")>-1){
							//jQuery(".try_msg").html(msg);
						}
						if(msg.indexOf("<span style='color:red;'>All other domains are not available</span>")==-1 && msg.indexOf("Please try again...")==-1){
							if(count==0){
								jQuery("#results").html(msg);
								count = 1;
							}else{
								jQuery("#results").append(msg);
							}
						}
										
					});
					
					<?php } ?>

				
				}else if(val==2){
					<?php $count =0; $size = sizeof($domain_keywords); foreach($domain_keywords as $dk){ ?>
					$.ajax({
						url: "process.php",
						type: "POST",
						
						data: {
							"domain": domain+'<?=$dk?>',
							"extention": jQuery("#domain_extention").val(),
							"option": val,
						}
					}).done(function(msg) {
						<?php $count++; if($count==$size){ ?>jQuery("#results_loading").html("");<?php } ?>	
						if(msg.indexOf("<span style='color:red;'>All other domains are not available</span>")>-1){
							jQuery(".available_msg").html(msg);
						}
						if(msg.indexOf("Please try again...")>-1){
							//jQuery(".try_msg").html(msg);
						}
						if(msg.indexOf("<span style='color:red;'>All other domains are not available</span>")==-1 && msg.indexOf("Please try again...")==-1){
							if(count==0){
								jQuery("#results").html(msg);
								count = 1;
							}else{
								jQuery("#results").append(msg);
							}
						}
					});
					
					<?php } ?>
				}else if(val==3){
					<?php $count =0; $size = sizeof($domain_keywords); foreach($domain_keywords as $dk){ ?>
					$.ajax({
						url: "process.php",
						type: "POST",
						
						data: {
							"domain": '<?=$dk?>'+domain,
							"extention": jQuery("#domain_extention").val(),
							"option": val,
						}
					}).done(function(msg) {
						<?php $count++; if($count==$size){ ?>jQuery("#results_loading").html("");<?php } ?>	
						if(msg.indexOf("<span style='color:red;'>All other domains are not available</span>")>-1){
							jQuery(".available_msg").html(msg);
						}
						if(msg.indexOf("Please try again...")>-1){
							//jQuery(".try_msg").html(msg);
						}
						if(msg.indexOf("<span style='color:red;'>All other domains are not available</span>")==-1 && msg.indexOf("Please try again...")==-1){
							if(count==0){
								jQuery("#results").html(msg);
								count = 1;
							}else{
								jQuery("#results").append(msg);
							}
						}
					});
					
					<?php } ?>
				}else if(val==4 || val==5 || val==6){
					$.ajax({
						url: "process.php",
						type: "POST",
						
						data: {
							"domain": domain,
							"option": val,
						}
					}).done(function(msg) {
						if(msg.indexOf("<span style='color:red;'>All other domains are not available</span>")>-1){
							jQuery(".available_msg").html(msg);
							jQuery("#results_loading").html("");
						}
						if(msg.indexOf("Please try again...")>-1){
							//jQuery(".try_msg").html(msg);
						}
						if(msg.indexOf("<span style='color:red;'>All other domains are not available</span>")==-1 && msg.indexOf("Please try again...")==-1){
							if(count==0){
								jQuery("#results").html(msg);
								count = 1;
								jQuery("#results_loading").html("");
							}else{
								jQuery("#results").append(msg);
								jQuery("#results_loading").html("");
							}
						}
					});

				}

            });

			$(document).on("click",".appraise",function(e){
				e.preventDefault();
				var thiss = $(this);
				thiss.html("Loading...");
					$.ajax({
						url:"process.php",
						type:"POST",
						data:{"appraise":1,"domain":$(this).attr("href")}	
					}).done(function(msg){
						thiss.after("<span>"+msg+"</span>");
						thiss.remove();
					});
			});

            function populate_sell_domains_sites() {
                $.ajax({
                    url: "selling_domains_sites.php",
                    type: "POST",
                }).done(function(msg) {
                    jQuery("#search_results_clickbank").html(msg);
                });
            }

            populate_sell_domains_sites();

            jQuery(document).on("click", "#search_results_clickbank a", function(e) {
                e.preventDefault();
				href = jQuery(this).attr("href");
                //href = "http://google.com" + jQuery(this).attr("href");
                window.open(href, "", "width=700, height=600,top=50, left=300");
            });
			
			jQuery(document).on("click", "#estibot_pop", function(e) {
                e.preventDefault();

                href = jQuery(this).val();
                window.open(href, "", "width=700, height=600,top=50, left=300");
            });
			
			

        });


function loaded(){
	//i = document.getElementById("i");
	//console.log(jQuery('#i').contents().find("#domain_search_input").remove());	
	$("#i").contents().find("#domain_search_form").hide();
	
}


        //document.getElementById("i").onload = function () { this.contentWindow.scrollTo(0, 200) };
    </script>
    <script src="js/jquery.mCustomScrollbar.js"></script>
<script>
function selectDomain(domain) {
	jQuery("#search_term").val(domain);
}

function rank(domain, table) {
	jQuery.get('rank.php?table=' + table + '&domain=' + domain);
}
</script>

</body>

</html>
