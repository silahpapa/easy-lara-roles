<?php

namespace Silah\LaraRoles\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class LaraRolesServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([\Silah\LaraRoles\App\Commands\Initialize::class,]);
        }
    }
    public function boot()
    {
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('checkRolesPermission', \Silah\LaraRoles\App\Http\Middleware\CheckRolesPermission::class);
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->publishes([
            __DIR__.'/../routes/api' => base_path('routes/api'),
        ], 'routes');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}
