<?php

namespace Services;

class ManufacturerSitemapGenerate extends SitemapGenerate
{
    public function getDate(): array
    {
        $db = $this->getDBConnection();

        $manufacturers = $db->query("SELECT * FROM oc_seo_url WHERE query LIKE 'manufacturer_id=%'");

        return $manufacturers->rows;
    }
}