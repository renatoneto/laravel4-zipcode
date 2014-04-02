## Laravel Zipcode

Laravel Zipcode is a package to provide zipcode consult and validation.

### Setup

Add the following line in the `composer.json` file

    "renatoneto/laravel4-cep": "dev-master"

Run composer update command

Add the service provider in `config/app.php`

    'providers' => array(

        'Illuminate\Foundation\Providers\ArtisanServiceProvider',
        'Illuminate\Auth\AuthServiceProvider',
        'Illuminate\Cache\CacheServiceProvider',
        'Illuminate\Session\CommandsServiceProvider',
        ...

        'Skape\Zipcode\ZipcodeServiceProvider',

    ),

...