<?php

namespace Hugomyb\ErrorMailer\Listeners;



use Hugomyb\ErrorMailer\Notifications\ErrorOccurred;
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
        $recipient = Config::get('error-mailer.email.recipient');

        Mail::to($recipient)->send(new ErrorOccurred($event->context['exception']));
    }
}
