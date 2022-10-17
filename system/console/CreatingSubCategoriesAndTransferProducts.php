<?php
$path = 'C:/OpenServer/domains/burj/';

$file_path = 'C:/OpenServer/domains/burj/categoryPhones.txt';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$text = file($file_path, FILE_SKIP_EMPTY_LINES);

$parent_category_id = -1;
$child_category_id = -1;
$post_child_category_id = -1;

foreach ($text as $product_id) {

    if (stripos($product_id, '->')) {
        $categories = explode('->', $product_id);
        $parent_category_id = $db->query("SELECT * FROM " . DB_PREFIX . "category_description WHERE name = '" . $db->escape(trim($categories[0])) . "'")->row['category_id'];
        $row_child_category = $db->query("SELECT * FROM " . DB_PREFIX . "category_description WHERE name = '" . $db->escape(trim($categories[1])) . "'")->row;
        if (empty($row_child_category)) {
            $child_category_id = addCategory($db, $parent_category_id, trim($categories[1]));
        } else {
            $child_category_id = $row_child_category['category_id'];
        }
        if (!empty($categories[2])) {
            $post_child_category_id = addCategory($db, $child_category_id, trim($categories[2]), $parent_category_id);
        } else {
            $post_child_category_id = -1;
        }
    } else {
        if ($child_category_id != -1) {
            copyProduct($db, $product_id, $child_category_id);
        }
        if ($post_child_category_id != -1){
            copyProduct($db, $product_id, $post_child_category_id);
        }
    }
}

function addCategory($db, $parent_category_id, $category_name, $first_parent_id = null) {
    $db->query("INSERT INTO " . DB_PREFIX . "category SET parent_id = '" . (int)$parent_category_id . "', `top` = 0, `column` = 0, sort_order =0, status = 1, date_modified = NOW(), date_added = NOW()");

    $category_id = $db->getLastId();

    $db->query("INSERT INTO " . DB_PREFIX . "category_description SET category_id = '" . (int)$category_id . "', language_id = 1, name = '" . $db->escape($category_name) . "'");
    if (empty($first_parent_id)) {
        $db->query("INSERT INTO `" . DB_PREFIX . "category_path` SET `category_id` = '" . (int)$category_id . "', `path_id` = '" . (int)$parent_category_id . "', `level` = 0");

        $db->query("INSERT INTO `" . DB_PREFIX . "category_path` SET `category_id` = '" . (int)$category_id . "', `path_id` = '" . (int)$category_id . "', `level` = 1");
    } else {
        $db->query("INSERT INTO `" . DB_PREFIX . "category_path` SET `category_id` = '" . (int)$category_id . "', `path_id` = '" . (int)$first_parent_id . "', `level` = 0");

        $db->query("INSERT INTO `" . DB_PREFIX . "category_path` SET `category_id` = '" . (int)$category_id . "', `path_id` = '" . (int)$parent_category_id . "', `level` = 1");

        $db->query("INSERT INTO `" . DB_PREFIX . "category_path` SET `category_id` = '" . (int)$category_id . "', `path_id` = '" . (int)$category_id . "', `level` = 2");
    }

    $db->query("INSERT INTO " . DB_PREFIX . "category_to_store SET category_id = '" . (int)$category_id . "', store_id = 0");

    $db->query("INSERT INTO " . DB_PREFIX . "category_to_layout SET category_id = '" . (int)$category_id . "', store_id = 0, layout_id = 0");

    return $category_id;
}

function copyProduct($db, $product_id, $parent_category_id) {

    $db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET product_id = " . (int)$product_id . ", category_id = " . (int)$parent_category_id);
}



