# Razorbacks Style

This is a library for University of Arkansas layout and style.

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
