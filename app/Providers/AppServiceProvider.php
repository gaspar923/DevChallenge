<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        Inertia::share([
            // 'globalData' => 'This is some global data',
            'APP_URL' => env('APP_URL'),
            'APP_NAME' => env('APP_NAME'),
            'auth.user' => function () {
                if (Auth::user()) {
                    // return auth()->user()->roles;
                    return Auth::user()->roles;
                }
            },
            // Add more shared data here
        ]);
    }
}
