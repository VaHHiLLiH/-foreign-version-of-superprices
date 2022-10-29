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
$products_chars = $db->query("SELECT * FROM " . DB_PREFIX . "spec WHERE language_id = 0 AND product_id IN (4719, 4720, 4722, 4723, 4724, 4725, 4726, 4727, 4728, 4729, 4730, 4731, 4732, 4733, 4734, 4735, 4737, 4740, 4742, 4743, 4744, 4745, 4747, 4748, 4749, 4750, 4751, 4753, 4754, 4755, 4756, 4757, 4758, 4759, 4760, 4761, 4762, 4763, 4764, 4765, 4766, 4767, 4768, 4769, 4770, 4771, 4772, 4773, 4839, 4841, 4842, 4843, 4844, 4845, 4846, 4847, 4848, 4849, 4850, 4851, 4852, 4853, 4854, 4855, 4856, 4857, 4858, 4859, 4860, 4861, 4862, 4863, 4864, 4866, 4867) ")->rows;

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
    $IAM_TOKEN = 't1.9euelZqbnc2Wy5LHxpaUlJ7HjsmZkO3rnpWakcuMkoycnYqLnp6JiZSJjI_l8_d2Sgxl-e82Y01V_d3z9zZ5CWX57zZjTVX9.hXdx5zGWM7GORSxZRIr3NyHn86Hn4jb_pMS60bURGoHPeYIva8zCLn7NMimjhJiuV7XYzCMO1dEj2OM98NBCBg';
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
}