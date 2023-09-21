<?php

namespace Hugomyb\ErrorMailer\Commands;

use Illuminate\Console\Command;

class PublishErrorMailerConfig extends Command
{
    protected $signature = 'error-mailer:publish-config';
    protected $description = 'Publish the configuration file for the Error Mailer package.';

    public function handle()
    {
        $this->info('Publishing configuration file for Error Mailer package...');

        $this->call('vendor:publish', [
            '--provider' => 'ErrorMailerServiceProvider',
            '--tag' => 'config'
        ]);

        $this->info('Configuration file published successfully.');
    }
}