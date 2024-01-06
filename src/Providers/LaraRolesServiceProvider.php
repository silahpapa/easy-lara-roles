<?php

namespace Silah\LaraRoles\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class LaraRolesServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([\Silah\LaraRoles\App\Commands\LaraRolesSetupCommand::class,]);
        }
    }
    public function boot()
    {
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('checkRolesPermission', \Silah\LaraRoles\App\Http\Middleware\CheckRolesPermission::class);
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'lara-roles');
    }
}
