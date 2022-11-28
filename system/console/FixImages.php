<?php
$path = '/var/www/www-root/data/www/technofox.site/';/*'C:/OpenServer/domains/randSheetOnOC.orc/';*/


// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');

// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$recordOnOnePage = 2000;
$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_product")->row['count'];
$current_page = 1;
$maxPages = ceil($allRecords/$recordOnOnePage);

while($current_page <= $maxPages) {
    $from = ($current_page-1)*$recordOnOnePage;

    $products = $db->query("SELECT * FROM oc_product LIMIT " . (int)$from . ", " . (int)$recordOnOnePage)->rows;

    foreach ($products as $product) {
        $db->query("UPDATE oc_product SET image = '" . $db->escape(str_replace('everydayshop.ru', 'technofox.site', $product['image'])) . "' WHERE product_id = " . $product['product_id']);
    }

    $current_page++;
}