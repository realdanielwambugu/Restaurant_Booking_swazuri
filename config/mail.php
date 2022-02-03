<?php

return [

   'mail' => [

   /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send any email
    | messages sent by your application.
    |
    */

        'default' => $_ENV['MAIL_MAILER'] ?? 'smtp',

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Configure all of the mailers used by your application plus
    | their respective settings.       "postmark", "log", "array"
    |
    */

        'mailers' => [

           'smtp' => [
                'transport' => 'smtp',
                'smtp_auth' => true,
                'smtp_secure' => 'tls',
                'smtp_debug' => 0,
                'host' => $_ENV['MAIL_HOST']  ?? 'smtp.gmail.com',
                'username' => $_ENV['MAIL_USERNAME']  ?? '',
                'mail_from' => $_ENV['MAIL_FROM']  ?? '',
                'password' =>  $_ENV['MAIL_PASSWORD']  ?? '',
                'port' => $_ENV['MAIL_PORT']  ?? 587,
                'html' => true,
                ],
        ],

   ],

];
