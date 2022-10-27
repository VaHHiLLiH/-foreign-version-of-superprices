<?php
$path = '/var/www/www-root/data/www/everydayshop.ru/';

$file_path = $path.'ProductsName.txt';
// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$text = file($file_path, FILE_IGNORE_NEW_LINES);
foreach ($text as $product) {
    $product_data = explode('->', $product);
    $product_id = $product_data[0];
    $product_name = $product_data[1];

    $db->query("UPDATE oc_product_description SET name = '" . $db->escape($product_name) . "' WHERE product_id = " . (int)$product_id);
}

