<?php

namespace App\Providers\Modules\TaskModule;

use App\Interfaces\TaskModule\Tasks\TaskReadInterface;
use App\Interfaces\TaskModule\Tasks\TaskWriteInterface;
use App\Repositories\TaskModule\Tasks\TaskReadRepository;
use App\Repositories\TaskModule\Tasks\TaskWriteRepository;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TaskReadInterface::class,TaskReadRepository::class);
        $this->app->bind(TaskWriteInterface::class,TaskWriteRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
    }
}
