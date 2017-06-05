<?php

namespace razorbacks\style;

use razorbacks\style\Exceptions\InvalidJson;

class Manifest
{
    const VERSION = '0.0.0+dev';
    protected static $CDN;
    protected static $CSS;
    protected static $MANIFEST_FILE;

    public static function cdn() : string
    {
        return static::$CDN
            ?? static::$CDN = getenv('RAZORBACKS_STYLE_CDN')
            ?: 'https://cdn.walton.uark.edu';
    }

    public static function cssLink() : string
    {
        return static::$CSS
            ?? static::$CSS = static::buildCssLink();
    }

    public static function manifestFile()
    {
        return static::$MANIFEST_FILE
            ?? static::$MANIFEST_FILE = getenv('RAZORBACKS_STYLE_MANIFEST_FILE')
            ?: realpath(__DIR__.'/../manifest.json');
    }

    protected static function buildCssLink() : string
    {
        $manifest = json_decode(file_get_contents(static::manifestFile()), $array = true);

        if (!is_array($manifest)) {
            throw new InvalidJson('Could not decode manifest: '.json_last_error_msg());
        }

        $link = '<link rel="stylesheet" href="%s/%s">';

        return sprintf($link, static::cdn(), $manifest['css']);
    }
}
