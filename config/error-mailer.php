<?php

return [
    'email' => [
        'recipient' => 'recipient@example.com',
        'subject' => 'An error has occured - ' . env('APP_NAME'),
    ],

    'disabledOn' => [
        //
    ],

    'cacheCooldown' => 10, // in minutes
];