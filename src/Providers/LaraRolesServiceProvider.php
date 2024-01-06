<?php

namespace Silah\LaraRoles\Providers;

use App\Console\Commands\UpdatePermissions;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Silah\LaraRoles\App\Commands\MakeModelAndMigration;

class LaraRolesServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Silah\LaraRoles\App\Commands\MakeModelAndMigration::class,
                \Silah\LaraRoles\App\Commands\UpdatePermissions::class,
                \Silah\LaraRoles\App\Commands\PublishLaraRolesFiles::class,
            ]);
        }
    }
    public function boot()
    {
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('checkRolesPermission', \Silah\LaraRoles\App\Http\Middleware\CheckRolesPermission::class);
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishes([
            __DIR__.'/../routes/api' => base_path('routes/api'),
        ], 'routes');

    }
}
