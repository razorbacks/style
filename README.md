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
4. `head` ([section][12] and [push][11])
5. `scripts` ([section][12] and [push][11])

Create a master page layout with your global elements,
e.g. `layouts/app.blade.php`

```php
@extends('razorbacks::layout')

@section('head')
    <!--
        these elements will appear on all views,
        unless explicitly overridden with a new @section('head')
    -->
    <link rel="stylesheet" href="/css/global.css">
@endsection

@section('navbar')
    <li><a href="https://example.com">Example</a></li>
@endsection

@section('navbar-right')
    <li><a href="https://example.com">Right</a></li>
@endsection

@section('scripts')
    <!--
        these scripts will appear on all views,
        unless explicitly overridden with a new @section('scripts')
    -->
    <script src="/js/global.js"></script>
@endsection
```

Then extend this layout for specific views.

```php
@extends('layouts.app')

@push('head')
    <!-- @push these elements onto the current view -->
    <link rel="stylesheet" href="/css/local.css">
@endpush

@section('content')
    <h1>hello world</h1>
    <p>here is some content</p>
@endsection

@push('scripts')
    <!-- @push these scripts onto the current view -->
    <script src="/js/local.js"></script>
@endpush
```

![example layout screenshot][10]

If you would like to use the default laravel authentication scaffolding,
then there is a `navbar-auth` partial included for the login/logout links.

```php
@extends('razorbacks::layout')

@section('navbar-right')
    @include('razorbacks::navbar-auth')
@endsection
```

For convenience, this exact template is included for extension as `layout-auth`

```php
@extends('razorbacks::layout-auth')

@section('navbar')
    <li><a href="https://example.com">Example</a></li>
@endsection

@section('content')
    <h1>hello world</h1>
    <p>here is some content</p>
@endsection
```

By default, the page title will be the app's name, but you can override this by
passing the variable `$title` to your views.

```php
return view('my-view', ['title' => 'Lorem ipsum dolor']);
```

And don't forget to push your description content meta tags.

```php
@push('head')
<meta name="description" content="Lorem ipsum dolor sit amet, consectetur.">
@endpush
```

If `APP_ENV` is set to anything except `production` then a notice is displayed.
You can customize the message by passing the `$notice` variable to your views
and even set it site-wide by sharing the variable with your views in
[the `boot` method of your `AppServiceProvider`][14]

```php
use View;

public function boot()
{
    View::share('notice', 'Lorem ipsum dolor sit amet.');
}
```

If you need to customize the views, then you can run:

    php artisan vendor:publish --tag=views --provider="razorbacks\style\laravel\StyleServiceProvider"

Then they will show up in your `views/vendor/razorbacks` directory.
Note that they are minified for efficiency, so you will likely want to
decompress them for development. Also the content hashes are hard-coded,
so use the [`Manifest` class][1] to get references to versioned assets.

```php
{!! razorbacks\style\Manifest::css() !!}
```

will output:

```html
<link rel="stylesheet" href="https://cdn.example.org/css/uark.3990e4a5bd9002a3753cf135b6096f73.css">
```

## JavaScript

There are some features enabled out of the box for common needs.

A `textarea` is automatically expanded to fit text.
To disable, add the class `no-autoexpand` to the element or any parent.

## Google Analytics

To include the analytics script on all your pages, first publish the configuration file.

    php artisan vendor:publish --tag=config --provider="razorbacks\style\laravel\StyleServiceProvider"

Then set the environment variable `GOOGLE_ANALYTICS_TRACKING_ID`

    GOOGLE_ANALYTICS_TRACKING_ID=UA-XXXXX-Y

## Default CDN

The default CDN is https://cdn.walton.uark.edu and it may be overridden by
setting the environment variable `RAZORBACKS_STYLE_CDN`

    RAZORBACKS_STYLE_CDN=https://mydevbox.example.com npm run dev

For production, change it in [`release.bash`][13]

    ./release.bash 1.0.1

## Favicon

Standard favicons and those optimized for touch devices were generated using
https://realfavicongenerator.net

[1]:./php/Manifest.php
[3]:https://travis-ci.org/razorbacks/style.svg?branch=master
[4]:https://travis-ci.org/razorbacks/style
[7]:https://codecov.io/gh/razorbacks/style/branch/master
[8]:https://img.shields.io/codecov/c/github/razorbacks/style/master.svg
[9]:https://getcomposer.org/
[10]:./docs/images/example-layout.jpg
[11]:https://laravel.com/docs/5.4/blade#stacks
[12]:https://laravel.com/docs/5.4/blade#template-inheritance
[13]:./release.bash
[14]:https://laravel.com/docs/5.4/views#passing-data-to-views
