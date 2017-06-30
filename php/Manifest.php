<?php

namespace razorbacks\style;

use razorbacks\style\Exceptions\InvalidJson;

class Manifest
{
    const VERSION = '1.1.0';
    protected static $CDN;
    protected static $CSS;
    protected static $JS;
    protected static $MANIFEST_FILE;
    protected static $MANIFEST_ARRAY;

    public static function cdn() : string
    {
        return static::$CDN
            ?? static::$CDN = getenv('RAZORBACKS_STYLE_CDN')
            ?: 'https://cdn.walton.uark.edu';
    }

    public static function css() : string
    {
        return static::$CSS
            ?? static::$CSS = static::buildCssLink();
    }

    public static function script()
    {
        return static::$JS
            ?? static::$JS = static::buildScriptTag();
    }

    public static function manifestFile()
    {
        return static::$MANIFEST_FILE
            ?? static::$MANIFEST_FILE = getenv('RAZORBACKS_STYLE_MANIFEST_FILE')
            ?: realpath(__DIR__.'/../manifest.json');
    }

    public static function manifestArray() : array
    {
        if (isset(static::$MANIFEST_ARRAY)) {
            return static::$MANIFEST_ARRAY;
        }

        $manifest = json_decode(file_get_contents(static::manifestFile()), $array = true);

        if (!is_array($manifest)) {
            throw new InvalidJson('Could not decode manifest: '.json_last_error_msg());
        }

        return static::$MANIFEST_ARRAY = $manifest;
    }

    protected static function buildCssLink() : string
    {
        $manifest = static::manifestArray();

        $link = '<link rel="stylesheet" href="%s/%s">';

        return sprintf($link, static::cdn(), $manifest['css']);
    }

    protected static function buildScriptTag() : string
    {
        $manifest = static::manifestArray();

        $tag = '<script src="%s/%s"></script>';

        return sprintf($tag, static::cdn(), $manifest['js']);
    }
}
