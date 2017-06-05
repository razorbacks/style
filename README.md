# Razorbacks Style

This is a library for University of Arkansas layout and style.

[![Build Status][4]][2] [![Codecov][8]][7]

## Laravel Blade

Register the service provider within your `config/app.php` file.

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

If you need to customize the views, then you can run:

    php artisan vendor:publish --provider="razorbacks\style\laravel\StyleServiceProvider"

Then they will show up in your `views/vendor/razorbacks` directory.

## Default CDN

The default CDN is https://cdn.walton.uark.edu and it's registered in 2 places.

1. [`Manifest.php`][1]
2. [`webpack.config.js`][2]

This may be overridden by setting the environment variable `RAZORBACKS_STYLE_CDN`

[1]:./php/Manifest.php
[2]:./webpack.config.js
[3]:https://travis-ci.org/razorbacks/style.svg?branch=master
[4]:https://travis-ci.org/razorbacks/style
[7]:https://codecov.io/gh/razorbacks/style/branch/master
[8]:https://img.shields.io/codecov/c/github/razorbacks/style/master.svg
