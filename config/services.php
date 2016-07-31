<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '286351998392877',
        'client_secret' => 'df23c449e215f4d2396879294af71b5d',
        'redirect' => 'http://sho-kinopoisk.dev/auth/facebook/callback',
    ],
    'google' => [
        'client_id' => '231093203826-pgoj0o35mnuko0r6dv85jkdfaq061icg.apps.googleusercontent.com',
        'client_secret' => 'TTKmQuwpAfo5bsLPH0YbA4eU',
        'redirect' => 'http://sho-kinopoisk.dev/auth/google/callback',
    ],
    'twitter' => [
        'client_id' => 'Br5vgvR1B7oJDSEhXUK8lEhN7',
        'client_secret' => 'GpMyBGNv3MU8L1vFj6VOU0JK9b1FCOXOd4Ttc4szbjhahrjywO',
        'redirect' => 'http://sho-kinopoisk.dev/auth/twitter/callback',
    ],

];
