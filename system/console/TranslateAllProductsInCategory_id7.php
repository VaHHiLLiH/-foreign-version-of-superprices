<?php
$path = 'C:/OpenServer/domains/randSheetOnOC.orc/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');


// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$products_in_games = $db->query("SELECT * FROM " . DB_PREFIX . "product_description pd LEFT JOIN " . DB_PREFIX . "product_to_category ptc ON (pd.product_id = ptc.product_id) WHERE ptc.category_id = 7")->rows;

var_dump($products_in_games);



/*--------------Test yandex translator api-----------------*/
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

