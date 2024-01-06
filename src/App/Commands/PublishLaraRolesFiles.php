<?php

namespace Silah\LaraRoles\App\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PublishLaraRolesFiles extends Command
{
    protected $signature = 'lara-roles:publish-files';

    protected $description = 'Publish LaraRoles files';

    public function handle()
    {
        $this->info('Publishing LaraRoles files...');
        $sourcePaths = [
            __DIR__.'/../../routes/api' => base_path('routes/api'),
            __DIR__.'/../../models/Core' => app_path('Models/Core'),
        ];

        foreach ($sourcePaths as $sourcePath => $destinationPath) {
            if (File::exists($sourcePath)) {
                File::copyDirectory($sourcePath, $destinationPath);
                $this->info("Published files from {$sourcePath} to {$destinationPath}");
            } else {
                $this->error("Source path {$sourcePath} does not exist.");
            }
        }
        $this->info('LaraRoles files published successfully.');
    }
}
