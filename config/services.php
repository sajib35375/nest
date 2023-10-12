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

    'facebook' => [
        'client_id' => '515551130454528',
        'client_secret' => '9e4366b0590c8f95e8af8f7226b983b1',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '1062508263263-vgptksp73prh6n6spj0s1u9126ek93nh.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],

    'github' => [
        'client_id' => '0456d60f0d4bdf5348cb',
        'client_secret' => '06a43ee53af0f7040423f20d34580b16b2a6687d',
        'redirect' => 'http://localhost:8000/login/github/callback',
    ],

];
