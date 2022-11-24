<?php
//$path = 'C:/OpenServer/domains/randSheetOnOC.orc/';
$path = '/var/www/www-root/data/www/everydayshop.ru/';

use Stichoza\GoogleTranslate\GoogleTranslate;

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$cumOfNames = [
    'Оптический Zoom',
    'Диафрагма',
    'Тип матрицы',
    'Чувствительность',
    'Формат записи видео',
];
$monOfNames = [
    'Подсветка',
];
$clock = [
    'Серия',
    'Мобильный интернет',
];
$gpu = [
    'Тип видеопамяти',
];


$tr = new GoogleTranslate('en');

//fix Cameras
$recordOnOnePage = 1000;
$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_spec s LEFT JOIN oc_product_to_category ptc ON (s.product_id = ptc.product_id) WHERE category_id = 4 AND s.language_id = 0")->row['count'];
$currentPage = 1;
$maxPages = ceil($allRecords/$recordOnOnePage);
var_dump("start cameras");
while ($currentPage <= $maxPages) {

    $from = ($currentPage-1)*$recordOnOnePage;

    $cameras_spec = $db->query("SELECT * FROM oc_spec s LEFT JOIN oc_product_to_category ptc ON (s.product_id = ptc.product_id) WHERE category_id = 4 AND s.language_id = 0 LIMIT " . (int)$from . ", " . (int)$recordOnOnePage)->rows;

    foreach ($cameras_spec as $product_spec) {
        if (!empty($product_spec['spec'])) {
            $groups_chars = json_decode($product_spec['spec'], true);
            foreach ($groups_chars as $key1 => $group_chars) {
                foreach ($group_chars as $key2 => $chars) {
                    foreach ($group_chars['subspecs'] as $key3 => $chars) {
                        if (in_array($chars['name'], $cumOfNames)) {
                            var_dump($product_spec['product_id']);
                            replaceValueSpec($tr->translate($chars['name']), $chars['value'], $product_spec['product_id'], $db);
                        }
                    }
                }
            }
        }
    }

    $currentPage++;
}
var_dump("end cameras");



var_dump("start Monitors");
//fix Monitors
$recordOnOnePage = 1000;
$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_spec s LEFT JOIN oc_product_to_category ptc ON (s.product_id = ptc.product_id) WHERE category_id = 2 AND s.language_id = 0")->row['count'];
$currentPage = 1;
$maxPages = ceil($allRecords/$recordOnOnePage);

while ($currentPage <= $maxPages) {

    $from = ($currentPage-1)*$recordOnOnePage;

    $cameras_spec = $db->query("SELECT * FROM oc_spec s LEFT JOIN oc_product_to_category ptc ON (s.product_id = ptc.product_id) WHERE category_id = 2 AND s.language_id = 0 LIMIT " . (int)$from . ", " . (int)$recordOnOnePage)->rows;

    foreach ($cameras_spec as $product_spec) {
        if (!empty($product_spec['spec'])) {
            $groups_chars = json_decode($product_spec['spec'], true);
            foreach ($groups_chars as $key1 => $group_chars) {
                foreach ($group_chars as $key2 => $chars) {
                    foreach ($group_chars['subspecs'] as $key3 => $chars) {
                        if (in_array($chars['name'], $monOfNames)) {
                            replaceValueSpec($tr->translate($chars['name']), $chars['value'], $product_spec['product_id'], $db);
                        }
                    }
                }
            }
        }
    }

    $currentPage++;
}
var_dump("end Monitors");



var_dump("start SmartWathes");
//fix SmartWathes
$recordOnOnePage = 1000;
$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_spec s LEFT JOIN oc_product_to_category ptc ON (s.product_id = ptc.product_id) WHERE category_id = 6 AND s.language_id = 0")->row['count'];
$currentPage = 1;
$maxPages = ceil($allRecords/$recordOnOnePage);

while ($currentPage <= $maxPages) {

    $from = ($currentPage-1)*$recordOnOnePage;

    $cameras_spec = $db->query("SELECT * FROM oc_spec s LEFT JOIN oc_product_to_category ptc ON (s.product_id = ptc.product_id) WHERE category_id = 6 AND s.language_id = 0 LIMIT " . (int)$from . ", " . (int)$recordOnOnePage)->rows;

    foreach ($cameras_spec as $product_spec) {
        if (!empty($product_spec['spec'])) {
            $groups_chars = json_decode($product_spec['spec'], true);
            foreach ($groups_chars as $key1 => $group_chars) {
                foreach ($group_chars as $key2 => $chars) {
                    foreach ($group_chars['subspecs'] as $key3 => $chars) {
                        if (in_array($chars['name'], $clock)) {
                            replaceValueSpec($tr->translate($chars['name']), $chars['value'], $product_spec['product_id'], $db);
                        }
                    }
                }
            }
        }
    }

    $currentPage++;
}
var_dump("end SmartWathes");



var_dump("start GPU");
//fix GPU
$recordOnOnePage = 1000;
$allRecords = $db->query("SELECT COUNT(*) as count FROM oc_spec s LEFT JOIN oc_product_to_category ptc ON (s.product_id = ptc.product_id) WHERE category_id = 8 AND s.language_id = 0")->row['count'];
$currentPage = 1;
$maxPages = ceil($allRecords/$recordOnOnePage);

while ($currentPage <= $maxPages) {

    $from = ($currentPage-1)*$recordOnOnePage;

    $cameras_spec = $db->query("SELECT * FROM oc_spec s LEFT JOIN oc_product_to_category ptc ON (s.product_id = ptc.product_id) WHERE category_id = 8 AND s.language_id = 0 LIMIT " . (int)$from . ", " . (int)$recordOnOnePage)->rows;

    foreach ($cameras_spec as $product_spec) {
        if (!empty($product_spec['spec'])) {
            $groups_chars = json_decode($product_spec['spec'], true);
            foreach ($groups_chars as $key1 => $group_chars) {
                foreach ($group_chars as $key2 => $chars) {
                    foreach ($group_chars['subspecs'] as $key3 => $chars) {
                        if (in_array($chars['name'], $gpu)) {
                            replaceValueSpec($tr->translate($chars['name']), $chars['value'], $product_spec['product_id'], $db);
                        }
                    }
                }
            }
        }
    }

    $currentPage++;
}
var_dump("end GPU");


function replaceValueSpec($name, $value, $product_id, $db)
{
    $product_spec = $db->query("SELECT * FROM oc_spec WHERE language_id = 2 AND product_id = " . (int)$product_id)->row;
    if (!empty($product_spec['spec'])) {
        $groups_chars = json_decode($product_spec['spec'], true);
        foreach ($groups_chars as $key1 => $group_chars) {
            foreach ($group_chars as $key2 => $chars) {
                foreach ($group_chars['subspecs'] as $key3 => $chars) {
                    if ($key2 != 'name') {
                        if ($chars['name'] == $name) {
                            $groups_chars[$key1][$key2][$key3]['value'] = $value;
                        }
                    }
                }
            }
        }
        $db->query("UPDATE oc_spec SET spec = '" . $db->escape(json_encode($groups_chars)) . "' WHERE language_id = 2 AND product_id = " . (int)$product_id);
    }
}