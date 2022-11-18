<?php

namespace Services;

abstract class SitemapGenerate
{
    /**
     * @return array
     */

    abstract function setDate(): array;

    protected function generate($date, $filePath, $url)
    {
        if (!isset(SITEMAP_GENERATE_DOMAIN)) {
            throw new \Exception('do not Domain');
        }
        $xmlDate = '<?xml version="1.0" encoding="UTF-8"?>
                    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($date as $item) {
            $xmlDate .= "<url>
                            <loc>https://everydayshop.ru" . $url . '/' . str_slug($item['name'], '-' , 'ru') . "</loc>
                            <lastmod>" . $date . "</lastmod>
                            <changefreq>weekly</changefreq>
                            <priority>0.8</priority>
                        </url>";
        }
        $xmlDate .= '</urlset>';
    }

}