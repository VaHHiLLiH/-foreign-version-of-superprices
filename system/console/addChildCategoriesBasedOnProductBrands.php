<?php

//$path = $argv['1'] == 'votzive' ? '/var/www/votzive.ru/public_html/' : 'F:/OSPanel/domains/votzive.tr/';
$path = 'C:/OpenServer/domains/burj/';
// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

//For testing
//$categories = $db->query("SELECT * FROM oc_category WHERE parent_id = 0")->rows;
$categories = $db->query("SELECT * FROM oc_category WHERE category_id = 2 OR category_id = 500 OR category_id = 501")->rows;
$category_to_manufacturer = array();
//Формирую массив [id_category][id_manufacture][array of products]
foreach ($categories as $category) {
    //$manufacturer_data = $db->query("SELECT m.manufacturer_id, p.product_id FROM oc_manufacturer m LEFT JOIN oc_product p ON (p.manufacturer_id = m.manufacturer_id) WHERE m.manufacturer_id IN (SELECT manufacturer_id FROM oc_product WHERE product_id IN (SELECT product_id FROM oc_product_to_category WHERE category_id = " . (int)$category['category_id'] . ")) ")->rows;
    $manufacturer_data = $db->query("select product_id, manufacturer_id from oc_product where product_id IN (select product_id from oc_product_to_category WHERE category_id = " . (int)$category['category_id'] . ")")->rows;
    if (isset($manufacturer_data) && !empty($manufacturer_data)) {
        foreach ($manufacturer_data as $key => $manufacture){
            if (!empty($manufacture['manufacturer_id']) && !empty($manufacture['product_id'])){
                $category_to_manufacturer[$category['category_id']][$manufacture['manufacturer_id']][] = $manufacture['product_id'];
            }
        }
    }
}
//var_dump($category_to_manufacturer);die();
foreach ($category_to_manufacturer as $category_id => $manufacturer_value){
    // Get category for id
    $query = $db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.category_id = '" . (int)$category_id . "' AND cd.language_id = 1 AND c.status = '1'");

    $parent_category = $query->row;

    if (! empty($parent_category)) {
        // search child category for name as parent_category_name.brand_name
        foreach ($manufacturer_value as $manufacture_id => $product_value) {
            $manufacture_data = $db->query("SELECT name FROM oc_manufacturer WHERE manufacturer_id = " . $manufacture_id )->row;

            if (!empty($manufacture_data)) {
                $manufacture_name = $manufacture_data['name'];

                $query = $db->query("SELECT cd.name, cd.category_id, c.parent_id FROM oc_category_description cd LEFT JOIN oc_category c ON (cd.category_id = c.category_id) WHERE name like '" . $db->escape($parent_category['name'] . ' ' . $manufacture_name) . "%' AND c.parent_id = ".$parent_category['category_id'])->row;

                $child_seo = str_slug($parent_category['name'] . ' ' . $manufacture_name, '-', 'ru');

                if (empty($query)) {
                    // Если нет категории parent_category_name.brand_name, надо ее создать (на основе данных $parent category) и поместить туда товары с брендом
                    //addCategory
                    $db->query("INSERT INTO oc_category SET parent_id = " . (int)$parent_category['category_id'] . ", `top` = '" . (isset($parent_category['top']) ? (int)$parent_category['top'] : 0) . "', `column` = '" . (isset($parent_category['column']) ? (int)$parent_category['column'] : 0) . "', sort_order = '" . (int)$parent_category['sort_order'] . "', status = '" . (int)$parent_category['status'] . "', date_modified = NOW(), date_added = NOW()");

                    $child_category_id = $db->getLastId();

                    $db->query("INSERT INTO oc_category_description SET category_id = '" . $child_category_id . "', language_id = 1, name = '" . $db->escape($parent_category['name'] . ' ' . $manufacture_name) . "', description = '" . $db->escape(str_replace($parent_category['name'], $parent_category['name'] . ' ' . $manufacture_name . ' ', $parent_category['description'])) . "', meta_title = '" . $db->escape(str_replace($parent_category['name'], $parent_category['name'] . ' ' . $manufacture_name . ' ', $parent_category['meta_title'])) . "', meta_description = '" . $db->escape(str_replace($parent_category['name'], $parent_category['name'] . ' ' . $manufacture_name . ' ', $parent_category['meta_description'])) . "', meta_keyword = '" . $db->escape(str_replace($parent_category['name'], $parent_category['name'] . ' ' . $manufacture_name . ' ', $parent_category['meta_keyword'])) . "'");

                    $db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = 0, language_id = 1, query = 'category_id=" . (int)$child_category_id . "', keyword = '" . $db->escape($child_seo) . "'");

                    // MySQL Hierarchical Data Closure Table Pattern
                    $level = 0;

                    $query = $db->query("SELECT * FROM `" . DB_PREFIX . "category_path` WHERE category_id = '" . (int)$parent_category['category_id'] . "' ORDER BY `level` ASC");

                    foreach ($query->rows as $result) {
                        $db->query("INSERT INTO `" . DB_PREFIX . "category_path` SET `category_id` = '" . $child_category_id . "', `path_id` = '" . (int)$result['path_id'] . "', `level` = '" . $level . "'");

                        $level++;
                    }

                    $db->query("INSERT INTO `" . DB_PREFIX . "category_path` SET `category_id` = '" . $child_category_id . "', `path_id` = '" . $child_category_id . "', `level` = '" . $level . "'");

                    $db->query("INSERT INTO " . DB_PREFIX . "category_to_layout SET category_id = '" . $child_category_id . "', store_id = 0, layout_id = 0");

                    $db->query("INSERT INTO " . DB_PREFIX . "category_to_store SET category_id = '" . $child_category_id . "', store_id = 0");

                    //Теперь добавляю товары в только что созданную категорию
                    $multi_products = [];
                    foreach ($product_value as $product_id) {
                        $multi_products[] = "(" . (int)$product_id . ", " . (int)$child_category_id . ")";
                    }
                    $products_query = implode(',', $multi_products) . ';';
                    $db->query("INSERT INTO " . DB_PREFIX . "product_to_category (product_id, category_id) VALUES " . $products_query);
                } else {
                    // Если есть такая категория то добавлять товары в нее, предварительно проверяя есть ли они там
                    $query_array = $db->query("SELECT * FROM " . DB_PREFIX . "product_to_category WHERE category_id = '" . (int)$query['category_id'] . "'")->rows;

                    $product_to_categories_id = [];
                    foreach ($query_array as $p_t_c) {
                        $product_to_categories_id[] = $p_t_c['product_id'];
                    }
                    $product_id_array = array_diff($product_value, $product_to_categories_id);

                    if (!empty($product_id_array)) {
                        $products_query = [];
                        foreach ($product_id_array as $id) {
                            $products_query[] = "(" . (int)$id . ", " . (int)$query['category_id'] . ")";
                        }

                        $products_query = implode(',', $products_query) . ';';
                        $db->query("INSERT INTO " . DB_PREFIX . "product_to_category (product_id, category_id) VALUES " . $products_query);
                    }
                }
            }
        }
    }
}
