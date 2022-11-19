<?php
$path = 'C:/OpenServer/domains/randSheetOnOC.orc/';

$file_path_updater = 'C:\openserver\domains\randSheetOnOC.orc\updater.txt';

$file_path_russian_words = 'C:\openserver\domains\randSheetOnOC.orc\russianWord.txt';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$recordOnOnePage = 2000;
$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_spec WHERE language_id = 2")->row['count'];
$current_page = 1;
$maxPages = ceil($allRecords/$recordOnOnePage);
$array = [];
while($current_page <= $maxPages) {
    $from = ($current_page-1)*$recordOnOnePage;

    $products_chars = $db->query("SELECT * FROM " . DB_PREFIX . "spec WHERE language_id = 2 LIMIT " . $from . ", " . $recordOnOnePage)->rows;

    foreach ($products_chars as $product_chars) {
        if (!empty($product_chars['spec'])) {
            $groups_chars = json_decode($product_chars['spec'], true);
                foreach ($groups_chars as $group_chars) {
                    foreach ($group_chars as $key1 => $chars) {
                        if ($key1 == 'name') {

                        } else if ($key1 == 'subspecs') {

                        } else {
                            //var_dump($key1);
                            //var_dump($product_chars['spec_id']);
                            if (!in_array($product_chars['spec_id'], $array)) {
                                $array[] = $product_chars['spec_id'];
                            }
                            break;
                        }
                    }
                }
        }
    }

    $current_page++;
}
var_dump($array);die();
foreach ($array as $key1 => $spec_id) {

    $specs = [];
    $specs['name'] = 'Detailed specifications';

    $product_chars = $db->query("SELECT * FROM " . DB_PREFIX . "spec WHERE language_id = 2 AND spec_id = " . (int)$spec_id)->row;
    $chars = json_decode($product_chars['spec'], true);
    foreach ($chars as $key2 => $group_char) {
        $value_array['name'] = $group_char['name'];
        $value_array['value'] = $group_char['value'];
        $specs['subspecs'][] = $value_array;
    }
    $db->query("UPDATE oc_spec SET spec = '[" . $db->escape(json_encode($specs)) . "]' WHERE language_id = 2 AND spec_id = " . (int)$spec_id);
}