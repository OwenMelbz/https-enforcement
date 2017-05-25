<?php return [

    /*
    |--------------------------------------------------------------------------
    | Whether or not to force requests to the https version of your app.
    |--------------------------------------------------------------------------
    */

    'enforce_https' => env('ENFORCE_HTTPS', false),

    /*
    |--------------------------------------------------------------------------
    | A list of URIs to exclude from enforcement, if they pass Request::is()
    |--------------------------------------------------------------------------
    */

   'except' => []

];
