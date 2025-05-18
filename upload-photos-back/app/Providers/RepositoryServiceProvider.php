<?php

namespace App\Providers;

use App\Repositories\AccountRepository;
use App\Repositories\AccountRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\TransactionRepository;
use App\Repositories\TransactionRepositoryInterface;
use App\Repositories\TransferRepository;
use App\Repositories\TransferRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(TransferRepositoryInterface::class,TransferRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class,TransactionRepository::class);
        $this->app->bind(PostRepositoryInterface::class,PostRepository::class);
        $this->app->bind(AccountRepositoryInterface::class,AccountRepository::class);
    }

    public function boot(): void
    {
    }
}
