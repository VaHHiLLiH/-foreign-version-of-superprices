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




$products_chars = $db->query("SELECT * FROM " . DB_PREFIX . "spec LIMIT 0, 10")->rows;

foreach ($products_chars as $key1 => $product_chars) {
    $characteristics = json_decode($product_chars['spec'], true);
    //var_dump($characteristics);
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

    $db->query("INSERT INTO " . DB_PREFIX . "spec (product_id, language_id, spec) VALUES (" . (int)$products_chars[$key1]['product_id'] . ", 2, " . $products_chars[$key1]['spec'] . ")");
    //var_dump($products_chars[$key1]);die();
}


function translateText($text)
{
    //return 'Случайное текст';
    $IAM_TOKEN = 't1.9euelZqYnJSJkM_GzM_KkJPIyJyQlu3rnpWakcuMkoycnYqLnp6JiZSJjI_l8_c_ZRZl-e8fXEw4_t3z938TFGX57x9cTDj-.c6FVZkVgMeSfcip8ukUyHHj-XA00Bk-ZcCHB6N8RJNRNGK4M7q2UgxMO1eea2ITenpiWMKUPHV6D-dD8Q2OzCQ';
    $folder_id = 'b1gq1kelin7d9rqn3ot0';
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
    //var_dump($translatedText['translations'][0]['text']);die();
}
/*--------------Test yandex translator api-----------------*/

//$OAuth-токен = 'y0_AgAAAAA4bYvPAATuwQAAAADQtj01ToJd5tqVSpiBmx-jbbrOYz0H53k';
//$Iam_TOKEN = 't1.9euelZqYnJSJkM_GzM_KkJPIyJyQlu3rnpWakcuMkoycnYqLnp6JiZSJjI_l8_c_ZRZl-e8fXEw4_t3z938TFGX57x9cTDj-.c6FVZkVgMeSfcip8ukUyHHj-XA00Bk-ZcCHB6N8RJNRNGK4M7q2UgxMO1eea2ITenpiWMKUPHV6D-dD8Q2OzCQ';
//$catalog_ID = 'b1g2omf1i3p6jmj32lgq';

/*$IAM_TOKEN = 't1.9euelZqUkcyJk8ialcaci8-dmpOSkO3rnpWakcuMkoycnYqLnp6JiZSJjI_l8_cKYn9l-e8ZKw88_t3z90oQfWX57xkrDzz-.tNxPPHPRKkX59gIzmLRi-NrZLbTP5jAFz8uiiEEpaUvV_1FaLzqF-UF_31kqdJr8y4lx0iBuO1-Q4JFxmV-xDQ';
$folder_id = 'b1gq1kelin7d9rqn3ot0';
$target_language = 'en';
$texts = ["я пишу этот текст для того, чтобы понять сколько символов будет влезать в описание продуктов"];

$url = 'https://translate.api.cloud.yandex.net/translate/v2/translate';

$headers = [
    'Content-Type: application/json',
    "Authorization: Bearer $IAM_TOKEN"
];

$post_data = [
    "targetLanguageCode" => $target_language,
    "texts" => $texts,
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

var_dump($result);*/
/*--------------End of testing translator api--------------*/

