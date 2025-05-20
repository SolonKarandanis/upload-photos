<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Query\Expression;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        QueryBuilder::macro('addSubSelect', function ($field, $callback) {
            $query = $callback();

            if (is_null($this->columns)) {
                $this->select($this->from.'.*');
            }

            if ($query instanceof EloquentBuilder) {
                $query = $query->getQuery();
            }

            if ($query instanceof QueryBuilder) {
                $query = $query->limit(1);
            }

            if ($query instanceof Expression) {
                $query = $query->getValue();
            }

            $this->selectSub($query, $field);
        });

        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
    }
}
