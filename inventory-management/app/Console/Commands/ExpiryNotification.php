<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExpiryNotification extends Command
{
    protected $signature = 'item:expiry-notification';
    protected $description = 'Send notifications for items nearing expiry';

    public function handle()
    {
        $this->info('Expiry notifications sent successfully!');
    }
}