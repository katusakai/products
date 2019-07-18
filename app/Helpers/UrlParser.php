<?php


namespace App\Helpers;


class UrlParser
{
    public static function ifLocal($url)
    {
        $parsed_url = parse_url($url);

        return isset($parsed_url['scheme']) || isset($parsed_url['host']) ? false : true;
    }
}