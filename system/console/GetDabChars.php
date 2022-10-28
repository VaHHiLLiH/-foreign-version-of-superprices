<?php
$path = '/var/www/www-root/data/www/everydayshop.ru/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$products_chars = $db->query("SELECT * FROM " . DB_PREFIX . "spec WHERE language_id = 0")->rows;

foreach ($products_chars as $chars) {

    $characteristics = json_decode($chars['spec'], true);
    if (empty($characteristics)) {
        $newChars = fixChars($chars['spec']);
        $db->query("UPDATE " . DB_PREFIX . "spec SET spec = '" . $db->escape($newChars) . "' WHERE spec_id = " . (int)$chars['spec_id']);
    }
}

function fixChars($chars)
{
    preg_match_all('/\{.*?\}/', $chars, $matches);

    $jsonArrayData = [];

    foreach($matches[0] as $item) {
        $data = json_decode($item);

        if (! empty($data->name) && ! empty($data->value)) {
            $jsonArrayData[] = [
                'name' => $data->name,
                'value' => $data->value,
            ];
        }
    }

    return json_encode($jsonArrayData);
}