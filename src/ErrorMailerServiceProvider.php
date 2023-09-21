<?php

namespace Hugomyb\ErrorMailer;

use Hugomyb\ErrorMailer\Listeners\NotifyAdminOfError;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Log\Events\MessageLogged;

class ErrorMailerServiceProvider extends ServiceProvider
{
    protected $listen = [
        MessageLogged::class => [
            NotifyAdminOfError::class,
        ],
    ];
}
