<?php

use Services\{
    ProductSitemapGenerate,
    CategorySitemapGenerate,
    ManufacturerSitemapGenerate,
};

$path = '/var/www/www-root/data/www/technofox.site/';

// Configuration
require_once($path . 'config.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');

$product = new ProductSitemapGenerate();

$product->generate($product->getDate(), $path.'sitemap/productsitemap.xml', 'product');

$category = new CategorySitemapGenerate();

$category->generate($category->getDate(), $path.'sitemap/categorysitemap.xml', 'category');

$manufacturer = new ManufacturerSitemapGenerate();

$manufacturer->generate($manufacturer->getDate(), $path.'sitemap/manufacturersitemap.xml', 'brand');