<?php

namespace Services;

use DB;

abstract class SitemapGenerate
{
    /**
     * @return array
     */

    abstract function getDate(): array;

    public function generate($data, $filePath, $url)
    {
        if (empty($data)) {
            throw new \Exception('Data is empty');
        }
        /*if (SITEMAP_GENERATE_DOMAIN) {
            throw new \Exception('do not Domain');
        }*/
        $xmlDate = '<?xml version="1.0" encoding="UTF-8"?>
                    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($data as $item) {
            $xmlDate .= "<url>
                            <loc>https://everydayshop.ru/" . $url . '/' . str_slug($item['keyword'], '-' , 'ru') . "</loc>
                            <lastmod>" . date('Y-m-d') . "</lastmod>
                            <changefreq>weekly</changefreq>
                            <priority>0.8</priority>
                        </url>";
        }
        $xmlDate .= '</urlset>';

        file_put_contents($filePath, $xmlDate);
    }

    public function getDBConnection()
    {
        return $db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);
    }

}