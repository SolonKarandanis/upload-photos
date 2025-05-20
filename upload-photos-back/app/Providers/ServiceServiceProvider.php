<?php

namespace App\Providers;

use App\Repositories\AccountRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\TransactionRepositoryInterface;
use App\Repositories\TransferRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\AccountService;
use App\Services\AccountServiceInterface;
use App\Services\PostService;
use App\Services\PostServiceInterface;
use App\Services\TransactionService;
use App\Services\TransactionServiceInterface;
use App\Services\TransferService;
use App\Services\TransferServiceInterface;
use App\Services\UserService;
use App\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->app->bind(UserServiceInterface::class, function ($app){
            return new UserService($app->make(UserRepositoryInterface::class));
        });
        $this->app->bind(TransferServiceInterface::class, function ($app){
            return new TransferService($app->make(TransferRepositoryInterface::class));
        });
        $this->app->bind(TransactionServiceInterface::class, function ($app){
            return new TransactionService($app->make(TransactionRepositoryInterface::class));
        });
        $this->app->bind(PostServiceInterface::class, function ($app){
            return new PostService($app->make(PostRepositoryInterface::class));
        });
        $this->app->bind(AccountServiceInterface::class, function ($app){
            return new AccountService(
                $app->make(UserServiceInterface::class),
                $app->make(TransactionServiceInterface::class),
                $app->make(TransferServiceInterface::class),
                $app->make(AccountRepositoryInterface::class)
            );
        });
    }
}
