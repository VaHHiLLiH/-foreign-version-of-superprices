<?php
$path = '/var/www/www-root/data/www/everydayshop.ru/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$russianBrandsCategory = [
    135,
    345,
    366,
    461,
    604,
    605,
    631,
    665,
    760,
    777,
    851,
    861,
    865,
];

foreach ($russianBrandsCategory as $category_id) {
    removeCategory($db, $category_id);
}


function removeCategory($db, $category_id) {
    $db->query("DELETE FROM " . DB_PREFIX . "category_path WHERE category_id = '" . (int)$category_id . "'");

    $products_query = $db->query("SELECT * FROM " . DB_PREFIX . "product_to_category WHERE category_id = " . (int)$category_id)->rows;

    foreach ($products_query as $product_id) {
        removeProduct($db, $product_id['product_id']);
    }

    $query = $db->query("SELECT * FROM " . DB_PREFIX . "category_path WHERE path_id = '" . (int)$category_id . "'");

    foreach ($query->rows as $result) {
        removeCategory($db, $result['category_id']);
    }

    $db->query("DELETE FROM " . DB_PREFIX . "category WHERE category_id = '" . (int)$category_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "category_description WHERE category_id = '" . (int)$category_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "category_filter WHERE category_id = '" . (int)$category_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "category_to_store WHERE category_id = '" . (int)$category_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "category_to_layout WHERE category_id = '" . (int)$category_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE category_id = '" . (int)$category_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "seo_url WHERE query = 'category_id=" . (int)$category_id . "'");
    $db->query("DELETE FROM " . DB_PREFIX . "coupon_category WHERE category_id = '" . (int)$category_id . "'");
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

