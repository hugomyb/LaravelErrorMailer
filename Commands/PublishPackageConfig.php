<?php

namespace Hugomyb\ErrorMailer\ErrorMailerServiceProvider;

use Illuminate\Console\Command;

class PublishPackageConfig extends Command
{
    protected $signature = 'package-name:publish-config';
    protected $description = 'Publish the package configuration file';

    public function handle()
    {
        $this->call('vendor:publish', [
            '--tag' => 'config',
            '--provider' => 'Hugomyb\ErrorMailer\ErrorMailerServiceProvider',
        ]);

        $this->info('Package configuration published successfully.');
    }
}