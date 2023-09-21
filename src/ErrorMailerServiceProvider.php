<?php

namespace Hugomyb\ErrorMailer;

use Hugomyb\ErrorMailer\Listeners\NotifyAdminOfError;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Log\Events\MessageLogged;
use Illuminate\Support\Facades\Event;

class ErrorMailerServiceProvider extends ServiceProvider
{
    protected $listen = [
        MessageLogged::class => [
            NotifyAdminOfError::class,
        ],
    ];

    public function register()
    {
        $this->app->singleton('error-mailer:publish-config', function ($app) {
            return new \Hugomyb\ErrorMailer\Commands\PublishErrorMailerConfig();
        });

        $this->commands([
            'error-mailer:publish-config',
        ]);

        $this->app->register(EventServiceProvider::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/error-mailer.php' => config_path('error-mailer.php'),
        ], 'config');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'errorMailer');
    }
}
