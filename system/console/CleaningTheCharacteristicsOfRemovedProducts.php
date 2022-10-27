<?php
$path = '/var/www/www-root/data/www/everydayshop.ru/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$countRecordOnPage = 10000;
$countRecords = $db->query("SELECT COUNT(*) as count FROM " . DB_PREFIX . "spec")->row['count'];
$currentList = 1;
$maxList = ceil($countRecords/$countRecordOnPage);

while ($currentList <= $maxList) {
    $from = ($currentList-1)*$countRecordOnPage;

    $chars = $db->query("SELECT spec_id, product_id FROM " . DB_PREFIX . "spec LIMIT " . (int)$from . ", " . (int)$countRecordOnPage)->rows;

    foreach ($chars as $product_char) {

        $checkProduct = $db->query("SELECT * FROM " . DB_PREFIX . "product WHERE product_id = " . (int)$product_char['product_id'])->row;

        if (empty($checkProduct)) {
            //var_dump('product_id = ' . $product_char['product_id']);
            $db->query("DELETE FROM " . DB_PREFIX . "spec WHERE spec_id = " . (int)$product_char['spec_id'] . " AND product_id = " . (int)$product_char['product_id']);
        }
    }

    $currentList++;
}
