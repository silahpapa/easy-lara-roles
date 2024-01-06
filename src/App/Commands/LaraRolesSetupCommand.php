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
        $this->warn('Initializing lara-roles');
        $app_dir = app_path();
        if(!file_exists($app_dir.'/Models/Core/Department.php')){
            $command2 = 'cp -r '.__DIR__.'/../../templates/Models/Core'.$app_dir.'/Models/';
            exec($command2);
            $this->info("Copied default models");
        }
        return Command::SUCCESS;
    }
}
