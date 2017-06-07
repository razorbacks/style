<?php

use PHPUnit\Framework\TestCase;
use razorbacks\style\Manifest;

class ManifestTest extends TestCase
{
    public function test_returns_css_link()
    {
        $expected = '<link rel="stylesheet" href="https://cdn.example.org/css/uark.3990e4a5bd9002a3753cf135b6096f73.css">';

        $actual = Manifest::css();

        $this->assertSame($expected, $actual);
    }

    public function test_returns_script_tag()
    {
        $expected = '<script src="https://cdn.example.org/js/uark.35527428764f1f375575.js"></script>';

        $actual = Manifest::script();

        $this->assertSame($expected, $actual);
    }
}
