<?php
//$path = 'C:/OpenServer/domains/randSheetOnOC.orc/';
$path = '/var/www/www-root/data/www/everydayshop.ru/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);




//$products_chars = $db->query("SELECT * FROM " . DB_PREFIX . "spec WHERE language_id = 0 LIMIT 4000, 2000")->rows;
$products_chars = $db->query("SELECT * FROM " . DB_PREFIX . "spec WHERE language_id = 0 AND product_id = 4718")->rows;

foreach ($products_chars as $key1 => $product_chars) {
    $characteristics = json_decode($product_chars['spec'], true);
    foreach ($characteristics as $key2 => $group_chars) {
        $characteristics[$key2]['name'] = translateText($group_chars['name']);
        $group_chars = $group_chars['subspecs'];
        foreach ($group_chars as $key3 => $group_char) {
            $group_chars[$key3]['name'] = translateText($group_char['name']);
            $group_chars[$key3]['value'] = translateText($group_char['value']);
        }
        $characteristics[$key2]['subspecs'] = $group_chars;
    }
    $products_chars[$key1]['spec'] = json_encode($characteristics);

    var_dump($products_chars[$key1]['product_id']);

    $db->query("INSERT INTO " . DB_PREFIX . "spec (product_id, language_id, spec) VALUES (" . (int)$products_chars[$key1]['product_id'] . ", 2, '" . $db->escape($products_chars[$key1]['spec']) . "')");
}


function translateText($text)
{
    //return 'Случайное текст';
    $IAM_TOKEN = '';
    $folder_id = '';
    $target_language = 'en';

    $url = 'https://translate.api.cloud.yandex.net/translate/v2/translate';

    $headers = [
        'Content-Type: application/json',
        "Authorization: Bearer $IAM_TOKEN"
    ];

    $post_data = [
        "targetLanguageCode" => $target_language,
        "texts" => $text,
        "folderId" => $folder_id,
    ];

    $data_json = json_encode($post_data);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);

    $result = curl_exec($curl);

    curl_close($curl);

    $translatedText = json_decode($result, true);
    return $translatedText['translations'][0]['text'];
}