<?php

namespace Modules\Task\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Task\Models\Task;
use Modules\User\Models\User;

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

        User::resolveRelationUsing('tasks',function (User $user){
            $user->hasMany(Task::class,'user_id,','id');
        });
    }
}
