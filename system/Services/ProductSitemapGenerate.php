<?php

namespace Services;

class ProductSitemapGenerate extends SitemapGenerate
{
    public function getDate(): array
    {
        $db = $this->getDBConnection();

        $products = $db->query("SELECT * FROM oc_seo_url WHERE query LIKE 'product_id=%'");

        return $products->rows;
    }
}