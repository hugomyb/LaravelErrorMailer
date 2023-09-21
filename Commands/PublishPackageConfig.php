<?php

namespace Hugomyb\ErrorMailer\ErrorMailerServiceProvider;

use Illuminate\Console\Command;

class PublishPackageConfig extends Command
{
    protected $signature = 'error-mailer:publish-config';
    protected $description = 'Publish the error-mailer configuration file';

    public function handle()
    {
        $this->call('vendor:publish', [
            '--tag' => 'config',
            '--provider' => 'Hugomyb\ErrorMailer\ErrorMailerServiceProvider',
        ]);

        $this->info('Error-mailer configuration published successfully.');
    }
}