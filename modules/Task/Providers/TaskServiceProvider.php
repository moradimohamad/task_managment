<?php

namespace Modules\Task\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
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
        Route::prefix('api/tasks')->middleware(['api','auth:api'])->group(dirname(__DIR__)."/routes/api.php");
    }
}
