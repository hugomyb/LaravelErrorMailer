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

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'error');

        $this->publishes([
            __DIR__.'/../config/error-mailer.php' => config_path('error-mailer.php'),
        ]);
    }
}
