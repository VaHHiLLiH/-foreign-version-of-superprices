<?php
$path = '/var/www/www-root/data/www/everydayshop.ru/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$recordOnOnePage = 2000;
$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_product_to_category")->row['count'];
$current_page = 1;
$maxPages = ceil($allRecords/$recordOnOnePage);

while($current_page <= $maxPages) {
    $from = ($current_page-1)*$recordOnOnePage;

    $records = $db->query("SELECT * FROM oc_product_to_category LIMIT " . (int)$from . ", " . (int)$recordOnOnePage)->rows;

    foreach ($records as $record) {
        $product = $db->query("SELECT * FROM oc_product WHERE product_id = " . (int)$record['product_id'])->row;

        if (empty($product)) {
            $db->query("DELETE FROM oc_product_to_category WHERE product_id = " . (int)$record['product_id']);
        }
    }

    $current_page++;
}