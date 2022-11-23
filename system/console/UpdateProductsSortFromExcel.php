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

$reader = IOFactory::createReader("Xlsx");
$content = $reader->load("/var/www/www-root/data/www/everydayshop.ru/slug-sort.xlsx");

$excel = $content->getActiveSheet();

for ($i = 2; $i <= $excel->getHighestRow(); $i++) {
    $slug = $excel->getCell('A' . $i)->getValue();
    $order = $excel->getCell('B' . $i)->getValue();

    $slug_info = $db->query("SELECT * FROM oc_seo_url WHERE keyword = '" . $db->escape($slug) . "'")->row;

    if (!empty($slug_info['query'])) {
        $product_id = str_replace('product_id=', '', $slug_info['query']);
        //var_dump($product_id);die();
        $db->query("UPDATE oc_product SET sort_order = " . (int)$order . " WHERE product_id = " . (int)$product_id);
    } else {
        var_dump($slug);
    }
}

