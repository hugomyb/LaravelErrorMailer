<?php

namespace Hugomyb\ErrorMailer\Listeners;



use Hugomyb\ErrorMailer\Notifications\ErrorOccurred;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class NotifyAdminOfError
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        if (!in_array(env('APP_ENV'), config('error-mailer.disabledOn'))) {

            $recipient = config()->has('error-mailer.email.recipient')
                ? config('error-mailer.email.recipient')
                : 'destinataire@example.com';

            $errorHash = md5($event->context['exception']->getMessage() . $event->context['exception']->getFile());

            $cacheKey = 'error_mailer_' . $errorHash;
            $coolDownPeriod = 15;

            if (!Cache::has($cacheKey)) {
                if (isset($event->context['exception'])) {
                    Mail::to($recipient)->send(new ErrorOccurred($event->context['exception']));
                    Cache::put($cacheKey, true, now()->addMinutes($coolDownPeriod));
                }
            }
        }
    }
}
