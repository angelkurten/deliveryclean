<?php

namespace App\Providers;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\User\EloquentUserRepository;
use App\Usecases\Contratcs\Users\CreateUserInterface;
use App\Usecases\Contratcs\Users\ListUserInterface;
use App\Usecases\Users\CreateUserUsecase;
use App\Usecases\Users\ListUserUsecase;
use Illuminate\Support\ServiceProvider;

class ContractServiceProvider extends ServiceProvider
{
    protected $classes = [
        CreateUserInterface::class => CreateUserUsecase::class,
        ListUserInterface::class => ListUserUsecase::class,

        //Repositories
        UserRepositoryInterface::class => EloquentUserRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
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
