<?php
$path = '/var/www/www-root/data/www/everydayshop.ru/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$russianBrands = [
    547,
    274,
    125,
    492,
    644,
    565,
    293,
    129,
    115,
    179,
];
foreach ($russianBrands as $brand_id) {
    deleteManufacturer($db, $brand_id);

    $products_ids = $db->query("SELECT * FROM " . DB_PREFIX . "product WHERE manufacturer_id = " . (int)$brand_id)->rows;

    foreach ($products_ids as $product_id){
        removeProduct($db, $product_id);
    }
}

function deleteManufacturer($db, $manufacturer_id) {
    $db->query("DELETE FROM `" . DB_PREFIX . "manufacturer` WHERE manufacturer_id = '" . (int)$manufacturer_id . "'");
    $db->query("DELETE FROM `" . DB_PREFIX . "manufacturer_to_store` WHERE manufacturer_id = '" . (int)$manufacturer_id . "'");
    $db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE query = 'manufacturer_id=" . (int)$manufacturer_id . "'");
}

function removeProduct($db, $product_id)
{
    $db->query("DELETE FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_description WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_filter WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE related_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_to_download WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_to_layout WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_to_store WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_recurring WHERE product_id = " . (int)$product_id);
    $db->query("DELETE FROM " . DB_PREFIX . "review WHERE product_id = '" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "seo_url WHERE query = 'product_id=" . (int)$product_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "coupon_product WHERE product_id = '" . (int)$product_id . "'");
}

