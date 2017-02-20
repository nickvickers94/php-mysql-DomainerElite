<?php

   require_once ("includes/conn.php");

   $row = "";
   $result = $conn->query("SELECT * FROM domains LIMIT 1");

   if ($result->num_rows > 0) {
      $row = $result->fetch_array(MYSQLI_BOTH);
   }

   $domain_keywords = explode(",", $row["domains_keywords"]);
   $start_keywords = explode(",", $row["start_keywords"]);
   $end_keywords = explode(",", $row["end_keywords"]);
   $result = $conn->query("SELECT domain FROM expired_domains ORDER BY rank DESC");

   while (list($domain) = mysqli_fetch_array($result)) {
      $expired_domains[] = $domain;
   }

   $result = $conn->query("SELECT domain FROM jamies_domains ORDER BY rank DESC");

   while (list($domain) = mysqli_fetch_array($result)) {
      $jamies_domains[] = $domain;
   }

   $result = $conn->query("SELECT domain FROM dictionary_domains ORDER BY rank DESC");

   while (list($domain) = mysqli_fetch_array($result)) {
      $dictionary_domains[] = $domain;
   }
?>

<?php if (isset($_POST["value"])): ?>
   <?php $option = $_POST["value"]; ?>
   <?php if ($option == 1): ?>
      <?php foreach($domain_keywords as $dk): ?>

         <tr>
            <td valign="top" width="20%">
               <a id="lnkdomain1" class="search_results_clickbank a">Select</a>
            </td>
            <td>
               <div><?=strtolower($dk)?></div>
            </td>
         </tr>

      <?php endforeach; ?>
   <?php elseif ($option == 2): ?>
      <?php foreach($start_keywords as $sk): ?>
         <tr>
            <td valign="top" width="20%">
               <a id="lnkdomain1" class="search_results_clickbank a">Select</a>
            </td>
            <td data-value="<?=strtolower($sk)?>">
               <div><?=strtolower($sk)?></div>
            </td>
         </tr>
      <?php endforeach; ?>
   <?php elseif ($option == 3): ?>
      <?php foreach ($end_keywords as $ek): ?>
         <tr>
            <td valign="top" width="20%">
               <a id="lnkdomain1" class="search_results_clickbank a">Select</a>
            </td>
            <td data-value="<?=strtolower($ek)?>">
               <div><?=strtolower($ek)?></div>
            </td>
         </tr>
      <?php endforeach; ?>
   <?php elseif ($option == 4): ?>
      <tr>
         <td valign="top" style="padding-right: 5px;text-align: right;">
            <strong>Rank</strong>
         </td>
         <td>
            <strong>Domain</strong>
         </td>
      </tr>
      <?php $rank = 1; ?>
      <?php foreach ($expired_domains as $ed): ?>
         <tr>
            <td valign="top" style="padding-right: 5px; text-align: right">
               <strong><?php echo $rank; ?></strong>
            </td>
            <td>
               <div><?=strtolower($ed)?></div>
            </td>
         </tr>
         <tr>
            <td>&nbsp;</td>
            <td>
               <a id="lnkdomain1" class="a" onclick="selectDomain('<?php echo strtolower($ed); ?>');">Select</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="lnkdomain1" class="a" onclick="rank('<?php echo strtolower($ed); ?>','expired_domains');$(this).text('You Voted!');">Vote</a>
            </td>
         </tr>
         <?php $rank++; ?>
      <?php endforeach; ?>
   <?php elseif ($option == 5): ?>
      <tr>
         <td valign="top" style="padding-right: 5px;text-align: right;"><strong>Rank</strong></td>
         <td>
            <strong>Domain</strong>
         </td>
      </tr>
      <?php $rank = 1; ?>
      <?php foreach($jamies_domains as $jd): ?>
         <tr>
            <td valign="top" style="padding-right: 5px; text-align: right">
               <strong><?php echo $rank; ?></strong>
            </td>
            <td>
               <div><?=strtolower($jd)?></div>
            </td>
         </tr>
         <tr>
            <td>&nbsp;</td>
            <td>
               <a id="lnkdomain1" class="a" onclick="selectDomain('<?php echo strtolower($jd); ?>');">Select</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="lnkdomain1" class="a" onclick="rank('<?php echo strtolower($jd); ?>','jamies_domains');$(this).text('You Voted!');">Vote</a>
            </td>
         </tr>
         <?php $rank++; ?>
      <?php endforeach; ?>
   <?php elseif ($option == 6): ?>
      <tr>
         <td valign="top" style="padding-right: 5px;text-align: right;">
            <strong>Rank</strong>
         </td>
         <td>
            <strong>Domain</strong>
         </td>
      </tr>
      <?php $rank = 1; ?>
      <?php foreach($dictionary_domains as $dd): ?>
         <tr>
            <td valign="top" style="padding-right: 5px; text-align: right">
               <strong><?php echo $rank; ?></strong>
            </td>
            <td>
               <div><?=strtolower($dd)?></div>
            </td>
         </tr>
         <tr>
            <td>&nbsp;</td>
            <td>
               <a id="lnkdomain1" class="a" onclick="selectDomain('<?php echo strtolower($dd); ?>');">Select</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="lnkdomain1" class="a" onclick="rank('<?php echo strtolower($dd); ?>','dictionary_domains');$(this).text('You Voted!');">Vote</a>
            </td>
         </tr>
         <?php $rank++; ?>
      <? endforeach; ?>
   <? endif; ?>
<? endif; ?>