<?php
require('includes/AvailabilityService.php');
$service = new AvailabilityService(true);

$testDomains = array(
    'google.com',
    'fasdf2342asdfcvcxv.org'
);

foreach ($testDomains as $domain) {
    $available = $service->isAvailable($domain);

    if ($available) {
        echo $domain." is not registered\n";
    } else {
        echo $domain." is registered\n";
    }
}

