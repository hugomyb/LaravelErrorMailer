<?php

namespace Hugomyb\ErrorMailer\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class ErrorOccurred extends Mailable
{
    use Queueable, SerializesModels;

    public $exception;

    public function __construct($exception)
    {
        $this->exception = $exception;
    }

    public function build()
    {
        return $this->subject(config('error-mailer.email.subject'))
            ->markdown('errorMailer::error')
            ->with(['exception' => $this->exception]);
    }
}
