<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        // ✔ DO NOT USE Passport::routes() in Laravel 11/12

        // Token expiration (optional)
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));

        // Scopes (optional)
        // Passport::tokensCan([
        //     'view-users' => 'View user data',
        //     'edit-users' => 'Edit user data',
        // ]);
    }
}
