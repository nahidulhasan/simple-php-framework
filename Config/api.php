<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Default API Version
    |--------------------------------------------------------------------------
    |
    | This is the default version when strict mode is disabled and your API
    | is accessed via a web browser. It's also used as the default version
    | when generating your APIs documentation.
    |
    */

    'version' => getenv('API_VERSION', 'v1'),

    /*
    |--------------------------------------------------------------------------
    | Default API Prefix
    |--------------------------------------------------------------------------
    |
    | A default prefix to use for your API routes so you don't have to
    | specify it for each group.
    |
    */

    'prefix' => getenv('API_PREFIX', null),

    /*
    |--------------------------------------------------------------------------
    | Default API url
    |--------------------------------------------------------------------------
    |
    | A default domain to use for your API routes so you don't have to
    | specify it for each group.
    |
    */

    'url' => getenv('API_URL', 'https://api.twitter.com/1.1/search/tweets.json'),

    /*
    |--------------------------------------------------------------------------
    | Name
    |--------------------------------------------------------------------------
    |
    | When documenting your API using the API Blueprint syntax you can
    | configure a default name to avoid having to manually specify
    | one when using the command.
    |
    */

    'name' => getenv('API_NAME', null),


    /*
    |--------------------------------------------------------------------------
    | Debug Mode
    |--------------------------------------------------------------------------
    |
    | Enabling debug mode will result in error responses caused by thrown
    | exceptions to have a "debug" key that will be populated with
    | more detailed information on the exception.
    |
    */

    'debug' => getenv('API_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    |
    | Basic auth info settings for API request
    |
    */

    'settings' => [
        'oauth_access_token' => getenv('OAUTH_ACCESS_TOKEN'),
        'oauth_access_token_secret' => getenv('OAUTH_ACCESS_TOKEN_SECRET'),
        'consumer_key' => getenv('CONSUMER_KEY'),
        'consumer_secret' => getenv('CONSUMER_SECRET')
    ],

    /*
    |--------------------------------------------------------------------------
    | API Middleware
    |--------------------------------------------------------------------------
    |
    | Middleware that will be applied globally to all API requests.
    |
    */

    'middleware' => [

    ]

];
