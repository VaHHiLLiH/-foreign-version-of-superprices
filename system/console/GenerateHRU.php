<?php

$path = 'C:/OpenServer/domains/burj/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$recordOnOnePage = 2000;
$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_product_description")->row['count'];
$current_page = 1;
$maxPages = ceil($allRecords/$recordOnOnePage);
var_dump('products');
while($current_page <= $maxPages) {
    $from = ($current_page-1)*$recordOnOnePage;

    $products = $db->query("SELECT * FROM oc_product_description LIMIT " . (int)$from . ", " . (int)$recordOnOnePage)->rows;

    foreach ($products as $product) {
        $checkSlug = $db->query("SELECT * FROM oc_seo_url WHERE query = 'product_id=" . $product['product_id'] . "'")->row;

        if (empty($checkSlug)) {
            $db->query("INSERT INTO oc_seo_url (store_id, language_id, query, keyword) VALUES (0, 2, 'product_id=" . $product['product_id'] . "', '" . str_slug($product['name'], '-', 'ru') . "')");
        }
    }

    $current_page++;
}


$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_category_description")->row['count'];
$current_page = 1;
$maxPages = ceil($allRecords/$recordOnOnePage);
var_dump('categories');
while($current_page <= $maxPages) {
    $from = ($current_page-1)*$recordOnOnePage;

    $categories = $db->query("SELECT * FROM oc_category_description LIMIT " . (int)$from . ", " . (int)$recordOnOnePage)->rows;

    foreach ($categories as $category) {
        $checkSlug = $db->query("SELECT * FROM oc_seo_url WHERE query = 'category_id=" . $category['category_id'] . "'")->row;

        if (empty($checkSlug)) {
            $db->query("INSERT INTO oc_seo_url (store_id, language_id, query, keyword) VALUES (0, 2, 'category_id=" . $category['category_id'] . "', '" . str_slug($category['name'], '-', 'ru') . "')");
        }
    }

    $current_page++;
}


$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_manufacturer")->row['count'];
$current_page = 1;
$maxPages = ceil($allRecords/$recordOnOnePage);
var_dump('manufacturers');
while($current_page <= $maxPages) {
    $from = ($current_page-1)*$recordOnOnePage;

    $manufacturers = $db->query("SELECT * FROM oc_manufacturer LIMIT " . (int)$from . ", " . (int)$recordOnOnePage)->rows;

    foreach ($manufacturers as $manufacturer) {
        $checkSlug = $db->query("SELECT * FROM oc_seo_url WHERE query = 'manufacturer_id=" . $manufacturer['manufacturer_id'] . "'")->row;

        if (empty($checkSlug)) {
            $db->query("INSERT INTO oc_seo_url (store_id, language_id, query, keyword) VALUES (0, 2, 'manufacturer_id=" . $manufacturer['manufacturer_id'] . "', '" . str_slug($manufacturer['name'], '-', 'ru') . "')");
        }
    }

    $current_page++;
}


