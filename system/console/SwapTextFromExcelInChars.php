<?php


use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


//$path = 'C:/OpenServer/domains/randSheetOnOC.orc/';
$path = '/var/www/www-root/data/www/everydayshop.ru/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

//Excel file
$reader = IOFactory::createReader("Xlsx");
$content = $reader->load("/var/www/www-root/data/www/everydayshop.ru/ru-eng_text.xlsx");

$excel = $content->getActiveSheet();



$recordOnOnePage = 2000;
$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_spec WHERE language_id = 2")->row['count'];
$current_page = 1;
$maxPages = ceil($allRecords/$recordOnOnePage);

while($current_page <= $maxPages) {
    $from = ($current_page-1)*$recordOnOnePage;

    $products_chars = $db->query("SELECT * FROM " . DB_PREFIX . "spec WHERE language_id = 2 LIMIT " . $from . ", " . $recordOnOnePage)->rows;

    foreach ($products_chars as $product_chars) {

        $updater = false;

        if (!empty($product_chars['spec'])) {
            $groups_chars = json_decode($product_chars['spec'], true);
            foreach ($groups_chars as $key1 => $group_chars) {
                foreach ($group_chars as $key2 => $chars) {
                    foreach ($group_chars['subspecs'] as $key3 => $chars) {
                        if ($key2 != 'name') {

                            $temporary = swapText($excel, $chars['value']);

                                $groups_chars[$key1][$key2][$key3] = [
                                    'name' => $chars['name'],
                                    'value' => $temporary
                                ];
                                $updater = true;
                        }
                    }
                }
            }
        }
        if($updater) {
            $db->query("UPDATE oc_spec SET spec = '" . $db->escape(json_encode($groups_chars)) . "' WHERE language_id = 2 AND spec_id = " . (int)$product_chars['spec_id']);
        }
    }
    $current_page++;
}

function swapText($excel, $text) {

    for ($i = 1; $i <= $excel->getHighestRow(); $i++) {
        $needle = $excel->getCell('A' . $i)->getValue();
        $search = $excel->getCell('B' . $i)->getValue();

        $text = str_replace($needle, $search, $text);
    }

    return $text;
}