<?php

namespace Silah\LaraRoles\App\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class LaraRolesSetupCommand extends Command
{
    protected $signature = 'lara-roles:setup';

    protected $description = 'Setup LaraRoles package';

    public function handle()
    {
        // Copy files to commands folder
        File::copyDirectory(__DIR__.'/', app_path('Console/Commands'));

        // Copy files to Http API Controllers folder
        File::copyDirectory(__DIR__.'/../Http/Controllers/Api', app_path('Http/Controllers/Api'));

        // Copy files to app folder
        $this->info('LaraRoles package setup completed.');
    }
}
