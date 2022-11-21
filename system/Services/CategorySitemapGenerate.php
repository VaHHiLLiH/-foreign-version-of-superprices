<?php

namespace Services;

class CategorySitemapGenerate extends SitemapGenerate
{
    public function getDate(): array
    {
        $db = $this->getDBConnection();

        $categories = $db->query("SELECT * FROM oc_seo_url WHERE query LIKE 'category_id=%'");

        return $categories->rows;
    }
}