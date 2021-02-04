<?php


namespace App\Providers;


use App\Repository\User\UserRepository;
use App\Repository\User\UserRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    public function boot()
    {
        $this->register();
    }
}