<?php

namespace Modules\User\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\User\Models\User;


class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(dirname(__DIR__) . "/database/migrations");
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::prefix('api')->group(dirname(__DIR__) . "/routes/api.php");

        config()->set('jwt', []);
        $this->mergeConfigFrom(dirname(__DIR__) . "/config/jwt.php", 'jwt');
        config()->set('auth.providers.users.model', User::class);
        config()->set('auth.guards.api', [
            'driver' => 'jwt',
            'provider' => 'users'
        ]);
        config()->set('auth.defaults.guard', 'api');

    }
}
