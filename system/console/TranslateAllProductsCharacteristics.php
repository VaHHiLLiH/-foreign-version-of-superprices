<?php

use Stichoza\GoogleTranslate\GoogleTranslate;

$path = 'C:/OpenServer/domains/burj/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$tr = new GoogleTranslate('en');

$recordOnOnePage = 2000;
$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_spec WHERE language_id = 0")->row['count'];
$current_page = 3;
$maxPages = ceil($allRecords/$recordOnOnePage);

while($current_page <= $maxPages) {
    $from = ($current_page-1)*$recordOnOnePage;

    $products_chars = $db->query("SELECT * FROM " . DB_PREFIX . "spec WHERE language_id = 0 LIMIT " . $from . ", " . $recordOnOnePage)->rows;

    if (!empty($products_chars)) {
        foreach ($products_chars as $key1 => $product_chars) {

            $checking_translated = $db->query("SELECT * FROM " . DB_PREFIX . "spec WHERE language_id = 2 AND spec_id = " . (int)$product_chars['spec_id'] . " AND product_id = " . (int)$product_chars['product_id'])->row;

            if (empty($checking_translated)) {

                $characteristics = json_decode($product_chars['spec'], true);
                foreach ($characteristics as $key2 => $group_chars) {
                    if ($group_chars['name'] != null) {
                        $characteristics[$key2]['name'] = $tr->translate($group_chars['name']);
                    }
                    $group_chars = $group_chars['subspecs'];
                    foreach ($group_chars as $key3 => $group_char) {
                        if ($group_char['name'] != null) {
                            $group_chars[$key3]['name'] = $tr->translate($group_char['name']);
                        }
                        if ($group_char['value'] != null) {
                            $group_chars[$key3]['value'] = $tr->translate($group_char['value']);
                        }
                    }
                    $characteristics[$key2]['subspecs'] = $group_chars;
                }
                $products_chars[$key1]['spec'] = json_encode($characteristics);

                var_dump($products_chars[$key1]['product_id']);

                $db->query("INSERT INTO " . DB_PREFIX . "spec (spec_id, product_id, language_id, spec) VALUES (" . (int)$products_chars[$key1]['spec_id'] . ", " . (int)$products_chars[$key1]['product_id'] . ", 2, '" . $db->escape($products_chars[$key1]['spec']) . "')");
            }
        }
    }
    $current_page++;
}



