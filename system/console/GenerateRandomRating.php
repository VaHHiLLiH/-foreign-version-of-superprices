<?php

$path = '/var/www/www-root/data/www/technofox.site/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');
require_once(DIR_SYSTEM . 'helper/general.php');
//first, second, third, fourth
$method = '';

// Database
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

$recordOnOnePage = 1000;
$allProducts = $db->query("SELECT COUNT(*) as count FROM oc_product")->row['count'];
$current_page = 1;
$maxPages = ceil($allProducts/$recordOnOnePage);

while($current_page <= $maxPages) {
    $from = ($current_page-1)*$recordOnOnePage;

    $products = $db->query("SELECT * FROM oc_product LIMIT " . (int)$from . ", " . (int)$recordOnOnePage)->rows;

    foreach ($products as $product) {
        $method = generateMethod();

        switch ($method) {
            case 'first':
                generateRatingByFirstMethod($db, $product['product_id']);
                break;
            case 'second':
                generateRatingBySecondMethod($db, $product['product_id']);
                break;
            case 'third':
                generateRatingByThirdMethod($db, $product['product_id']);
                break;
            case 'fourth':
                generateRatingByFourthMethod($db, $product['product_id']);
                break;
        }
        //die();
    }

    $current_page++;
}

function generateMethod()
{
    $number = mt_rand(1, 10);

    if ($number <= 4) {
        return 'first';
    } else if ($number <= 6) {
        return 'second';
    } else if ($number == 7) {
        return 'third';
    } else {
        return 'fourth';
    }
}

function generateRatingByFirstMethod($db, $product_id) {
    for($i = 0; $i < 10; $i++) {
        $rating = mt_rand(1, 10);
        $mark = 0;
        if ($rating <= 2) {
            $mark = 3;
        } else if ($rating <= 5) {
            $mark = 4;
        } else {
            $mark = 5;
        }

        $db->query("INSERT INTO oc_review (product_id, customer_id, author, text, rating, status, date_added, date_modified) VALUES (" . $product_id . ", 0, 'NoName', 'NoText', " . $mark . ", 1, NOW(), NOW())");
    }
}

function generateRatingBySecondMethod($db, $product_id) {
    for($i = 0; $i < 10; $i++) {
        $rating = mt_rand(1, 100);
        $mark = 0;
        if ($rating <= 5) {
            $mark = 3;
        } else if ($rating <= 30) {
            $mark = 4;
        } else {
            $mark = 5;
        }

        $db->query("INSERT INTO oc_review (product_id, customer_id, author, text, rating, status, date_added, date_modified) VALUES (" . $product_id . ", 0, 'NoName', 'NoText', " . $mark . ", 1, NOW(), NOW())");
    }
}

function generateRatingByThirdMethod($db, $product_id) {
    for($i = 0; $i < 10; $i++) {
        $db->query("INSERT INTO oc_review (product_id, customer_id, author, text, rating, status, date_added, date_modified) VALUES (" . $product_id . ", 0, 'NoName', 'NoText', 5, 1, NOW(), NOW())");
    }
}

function generateRatingByFourthMethod($db, $product_id) {
    for($i = 0; $i < 10; $i++) {
        $rating = mt_rand(1, 10);
        $mark = 0;
        if ($rating <= 4) {
            $mark = 4;
        } else {
            $mark = 5;
        }

        $db->query("INSERT INTO oc_review (product_id, customer_id, author, text, rating, status, date_added, date_modified) VALUES (" . $product_id . ", 0, 'NoName', 'NoText', " . $mark . ", 1, NOW(), NOW())");
    }
}


