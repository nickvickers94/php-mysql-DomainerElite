<?php


# include parseCSV class.
require_once('includes/parsecsv.lib.php');

$file = "files/".$_POST['csv'];
# create new parseCSV object.
$csv = new parseCSV();


# Example conditions:
// $csv->conditions = 'title contains paperback OR title contains hardcover';
// $csv->conditions = 'author does not contain dan brown';
// $csv->conditions = 'rating < 4 OR author is John Twelve Hawks';
// $csv->conditions = 'rating > 4 AND author is Dan Brown';

$csv->conditions = 'appraised_value >= 900 AND domain does not contain 0 AND domain does not contain 1 AND domain does not contain 2 AND domain does not contain 3 AND domain does not contain 4 AND domain does not contain 5 AND domain does not contain 6 AND domain does not contain 7 AND domain does not contain 8 AND domain does not contain 9 AND domain does not contain - AND domain contains .COM';


# Parse '_books.csv' using automatic delimiter detection.
$csv->auto($file);


# Output result.
// print_r($csv->data);


?>

<?php $expired_domains = ""; ?>
<?php foreach ($csv->data as $key => $row): ?>
	<?php if (strlen($row['domain']) < 16): ?>
		<?php
			$expired_domains .= $row['domain']."\n";
		?>
	<?php endif; ?>
<?php endforeach; ?>
<?php $expired_domains = trim($expired_domains, "\n"); ?>
<?php echo($expired_domains); ?>