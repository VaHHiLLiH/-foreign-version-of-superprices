<?php
$path = '/var/www/www-root/data/www/everydayshop.ru/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$products_chars = $db->query("SELECT * FROM " . DB_PREFIX . "spec WHERE language_id = 0 LIMIT 4000, 2000")->rows;
var_dump('start');
foreach ($products_chars as $key1 => $product_chars) {
    $characteristics = json_decode($product_chars['spec'], true);
    foreach ($characteristics as $group_chars) {
        if (empty($group_chars['name'])) {
            var_dump($products_chars[$key1]['product_id']);
        }
    }
    //$db->query("INSERT INTO " . DB_PREFIX . "spec (product_id, language_id, spec) VALUES (" . (int)$products_chars[$key1]['product_id'] . ", 2, '" . $db->escape($products_chars[$key1]['spec']) . "')");
}
var_dump('end');

