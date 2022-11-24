<?php
//$path = 'C:/OpenServer/domains/randSheetOnOC.orc/';

//$file_path_russian_words = 'C:\openserver\domains\randSheetOnOC.orc\russianWord.txt';
$path = '/var/www/www-root/data/www/everydayshop.ru/';

$file_path_russian_words = '/var/www/www-root/data/www/everydayshop.ru/russianWord.txt';


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

while($current_page <= $maxPages) {
    $from = ($current_page-1)*$recordOnOnePage;

    $products_chars = $db->query("SELECT * FROM " . DB_PREFIX . "spec WHERE language_id = 2 LIMIT " . $from . ", " . $recordOnOnePage)->rows;

    foreach ($products_chars as $product_chars) {

        if (!empty($product_chars['spec'])) {
            $groups_chars = json_decode($product_chars['spec'], true);
            foreach ($groups_chars as $key1 => $group_chars) {
                foreach ($group_chars as $key2 => $chars) {
                    if ($key2 == 'name') {
                        preg_match('/[а-яА-Я]/u', $chars, $matches);
                        if (!empty($matches)) {
                            file_put_contents($file_path_russian_words, 'Id характеристики - ' . $product_chars['spec_id'] . ' Слово - ' . $chars . "\r\n", FILE_APPEND);
                        }
                    }
                    foreach ($group_chars['subspecs'] as $key3 => $chars) {
                        foreach ($chars as $char) {
                            preg_match('/[а-яА-Я]/u', $char, $matches);
                            if (!empty($matches)) {
                                file_put_contents($file_path_russian_words, 'Id характеристики - ' . $product_chars['spec_id'] . ' Слово - ' . $char . "\r\n", FILE_APPEND);
                            }
                        }
                    }
                }
            }
        }
    }

    $current_page++;
}