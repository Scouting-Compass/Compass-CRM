<?php

namespace ActivismeBe\Providers;

use Illuminate\Support\ServiceProvider;
use ActivismeBe\User;
use ActivismeBe\Observers\UserObserver;

/**
 * Class AppServiceProvider
 * 
 * @package ActivismeBe\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
    }
}
