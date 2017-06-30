# Razorbacks Style

This is a library for University of Arkansas layout and style.
All style sheets, javascripts, and images are served through a CDN.

[![Build Status][3]][4] [![Codecov][8]][7]

## Laravel Blade

Add the library with [composer][9].

    composer require razorbacks/style

If you're using laravel 5.5 or greater, then installation is complete.
However, if you're using laravel 5.4 or older, then you'll need to manually
register the service provider within your `config/app.php` file.

```php
/*
|--------------------------------------------------------------------------
| Autoloaded Service Providers
|--------------------------------------------------------------------------
|
| The service providers listed here will be automatically loaded on the
| request to your application. Feel free to add your own services to
| this array to grant expanded functionality to your applications.
|
*/

'providers' => [

    ...

    /*
     * Package Service Providers...
     */
    razorbacks\style\laravel\StyleServiceProvider::class,

    ...

],
```

Extend the `razorbacks::layout` view and the following sections are available:

1. `content`
2. `navbar`
3. `navbar-right`
4. `head`
5. `scripts` loaded after `</body>`

```html
@extends('razorbacks::layout')

@section('head')
    <link rel="stylesheet" href="https://example.com/style.css">
@endsection

@section('navbar')
    <li><a href="https://example.com">Example</a></li>
@endsection

@section('navbar-right')
    <li><a href="https://example.com">Right</a></li>
@endsection

@section('content')
    <h1>hello world</h1>
    <p>here is some content</p>
@endsection

@section('scripts')
    <script src="https://example.com/script.js"></script>
@endsection
```

![example layout screenshot][10]

If you would like to use the default laravel authentication scaffolding,
then there is a `navbar-auth` partial included for the login/logout links.

```html
@extends('razorbacks::layout')

@section('navbar-right')
    @include('razorbacks::navbar-auth')
@endsection
```

For convenience, this exact template is included for extension as `layout-auth`

```html
@extends('razorbacks::layout-auth')

@section('navbar')
    <li><a href="https://example.com">Example</a></li>
@endsection

@section('content')
    <h1>hello world</h1>
    <p>here is some content</p>
@endsection
```

If you need to customize the views, then you can run:

    php artisan vendor:publish --provider="razorbacks\style\laravel\StyleServiceProvider"

Then they will show up in your `views/vendor/razorbacks` directory.
Note that they are minified for efficiency, so you will likely want to
decompress them for development. Also the content hashes are hard-coded,
so use the [`Manifest` class][1] to get references to versioned assets.

```html
{!! razorbacks\style\Manifest::css() !!}
```

will output:

```html
<link rel="stylesheet" href="https://cdn.example.org/css/uark.3990e4a5bd9002a3753cf135b6096f73.css">
```

## Default CDN

The default CDN is https://cdn.walton.uark.edu and it's registered in 2 places.

1. [`Manifest.php`][1]
2. [`webpack.config.js`][2]

This may be overridden by setting the environment variable `RAZORBACKS_STYLE_CDN`

## Favicon

Standard favicons and those optimized for touch devices were generated using
https://realfavicongenerator.net

[1]:./php/Manifest.php
[2]:./webpack.config.js
[3]:https://travis-ci.org/razorbacks/style.svg?branch=master
[4]:https://travis-ci.org/razorbacks/style
[7]:https://codecov.io/gh/razorbacks/style/branch/master
[8]:https://img.shields.io/codecov/c/github/razorbacks/style/master.svg
[9]:https://getcomposer.org/
[10]:./docs/images/example-layout.jpg
