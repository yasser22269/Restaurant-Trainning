<?php

namespace App\Providers;

use App\Http\Repository\EmployeeRepository;
use App\Http\Repository\EmployeeRepositoryInterface;
use App\Http\Repository\UserRepository;
use App\Http\Repository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            EmployeeRepositoryInterface::class,
            EmployeeRepository::class,

        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,

        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
