<?php

namespace Silah\LaraRoles\App\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PublishLaraRolesFiles extends Command
{
    protected $signature = 'lara-roles:publish-files';

    protected $description = 'Publish LaraRoles files';

    public function handle()
    {
        $this->info('Publishing LaraRoles files...');
        $sourcePaths = [
            __DIR__.'/../../routes/api' => base_path('routes/api'),
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
        $this->info('Seeding data...');
        $table = DB::table('roles')->get();
        if($table->isEmpty()){
            DB::table('roles')->insert([
                ['name' => 'admin'],
                ['name' => 'user']
            ]);
            DB::table('departments')->insert([
                ['name' => 'super_admin']
            ]);
            DB::table('users')->insert([
                'name' => 'super_admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('123456'),
                'role_id' => 1,
                'department_id' => 1
            ]);
        }
        $this->info('Data seeded successfully.');

    }
}
