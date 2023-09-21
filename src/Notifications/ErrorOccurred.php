<?php

namespace Hugomyb\ErrorMailer\Notifications;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class ErrorOccurred extends Mailable
{
    use SerializesModels;

    public $exception;

    public function __construct($exception)
    {
        $this->exception = $exception;
    }

    public function build()
    {
        return $this->subject(Config::get('error-mailer.email.subject'))
            ->markdown('error-mailer::mails.error')
            ->with(['exception' => $this->exception]);
    }
}
