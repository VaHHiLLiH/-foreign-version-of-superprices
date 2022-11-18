<?php
$path = '/var/www/www-root/data/www/everydayshop.ru/';/*C:/OpenServer/domains/randSheetOnOC.orc/*/

$file_path = '/var/www/www-root/data/www/everydayshop.ru/image/catalog/demo/product/';
// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$recordOnOnePage = 2000;
$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_product")->row['count'];
$current_page = 1;
$maxPages = ceil($allRecords/$recordOnOnePage);

while($current_page <= $maxPages) {
    $from = ($current_page-1)*$recordOnOnePage;

    $products = $db->query("SELECT * FROM oc_product p LEFT JOIN oc_product_description pd ON (p.product_id = pd.product_id) LIMIT " . (int)$from . ", " . (int)$recordOnOnePage)->rows;

    foreach ($products as $product) {
        $image = file_get_contents($product['image']);

        file_put_contents($file_path.str_slug($product['name']), $image, FILE_APPEND);die();

        //перезаписываю путь к изображению в oc_product['image']
    }
    $current_page++;
}