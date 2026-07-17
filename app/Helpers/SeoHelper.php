<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class SeoHelper
{
    /**
     * Generate HTML alternate links for multi-language indexing.
     */
    public static function getAlternateLinks()
    {
        $currentPath = Request::path();
        
        // Strip out the current language segment from path to get the base path
        // e.g. "fr/cars" -> "cars"
        $segments = Request::segments();
        if (count($segments) > 0 && in_array($segments[0], ['en', 'fr'])) {
            array_shift($segments);
        }
        $basePath = implode('/', $segments);
        
        $enUrl = url('/en/' . $basePath);
        $frUrl = url('/fr/' . $basePath);

        return <<<HTML
<link rel="alternate" hreflang="en" href="{$enUrl}" />
    <link rel="alternate" hreflang="fr" href="{$frUrl}" />
    <link rel="alternate" hreflang="x-default" href="{$enUrl}" />
HTML;
    }

    /**
     * Generate JSON-LD Schema markup for Google Rich Snippets (Car Rental & Local Business).
     */
    public static function getSchemaMarkup()
    {
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "AutoRental",
            "name" => "Car Airport Morocco",
            "image" => asset('/images/logo.png'),
            "@id" => url('/'),
            "url" => url('/'),
            "telephone" => "+212600988632",
            "priceRange" => "$$ - $$$",
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "Marrakech Airport (RAK)",
                "addressLocality" => "Marrakech",
                "postalCode" => "40000",
                "addressCountry" => "MA"
            ],
            "geo" => [
                "@type" => "GeoCoordinates",
                "latitude" => 31.6069,
                "longitude" => -8.0363
            ],
            "openingHoursSpecification" => [
                "@type" => "OpeningHoursSpecification",
                "dayOfWeek" => [
                    "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"
                ],
                "opens" => "00:00",
                "closes" => "23:59"
            ],
            "sameAs" => [
                "https://www.facebook.com/carairportmorocco",
                "https://www.instagram.com/carairportmorocco"
            ]
        ];

        return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
