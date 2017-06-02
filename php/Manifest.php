<?php

namespace razorbacks\style;

class Manifest
{
    const VERSION = '0.0.0+dev';
    protected static $CDN;

    public static function cdn() : string
    {
        return static::$CDN
            ?? static::$CDN = getenv('RAZORBACKS_STYLE_CDN')
            ?: 'https://cdn.walton.uark.edu';
    }

    public static function css() : string
    {
        $cdn = static::cdn();

        $version = static::VERSION;

        return "$cdn/uark.$version.css";
    }
}
