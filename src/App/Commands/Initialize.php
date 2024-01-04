<?php

namespace Silah\LaraRoles\App\Commands;

use Illuminate\Console\Command;

class Initialize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lara-roles:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create migration files and publish assets';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->warn('Initializing lara-roles');
        $app_dir = app_path();
        if(!file_exists($app_dir.'/Models/Core/Department.php')){
            $command2 = 'cp -r '.__DIR__.'/../../templates/Models/Core '.$app_dir.'/Models/';
            exec($command2);
            $this->info("Copied default models");
        }
        if(!file_exists($app_dir."/Http/Middleware/CheckPermission.php")){
            $command3 = 'cp -r '.__DIR__.'/../../App/Http/Middleware '.$app_dir.'/Http/';
            exec($command3);
            $this->info("Copied default middleware");
        }
         if(!file_exists($app_dir."routes/api/department.php")){
            $command4 = 'cp -r '.__DIR__.'/../../routes/api'.'/routes/';
            exec($command4);
            $this->info("Copied default routes");
         }

        return Command::SUCCESS;
    }
}
