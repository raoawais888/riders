<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '599129146106-8neb56vm8uo56nc4qd5jq7lcte3mo7gf.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '3636888779902924',
        'client_secret' => '7cf33403d5567c383e7e3fb02cfff29a',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

];
