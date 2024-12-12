<?php

namespace Modules\User\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(dirname(__DIR__)."/database/migrations");
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::prefix('api')->group(dirname(__DIR__)."/routes/api.php");
    }
}
