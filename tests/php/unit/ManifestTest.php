<?php

use PHPUnit\Framework\TestCase;
use razorbacks\style\Manifest;

class ManifestTest extends TestCase
{
    public function test_returns_css_link_from_manifest_json()
    {
        $expected = '<link rel="stylesheet" href="https://cdn.example.org/uark.3990e4a5bd9002a3753cf135b6096f73.css">';

        $actual = Manifest::cssLink();

        $this->assertSame($expected, $actual);
    }
}
