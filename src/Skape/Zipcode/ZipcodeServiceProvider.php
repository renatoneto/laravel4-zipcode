<?php
namespace Skape\Zipcode;

use Illuminate\Support\ServiceProvider;

class ZipcodeServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    public function boot()
    {
        \Validator::extend('zipcode_exists', '\Skape\Zipcode\Validation\ZipcodeExists@validate');
    }

} 