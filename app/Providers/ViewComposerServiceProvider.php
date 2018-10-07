<?php

namespace ActivismeBe\Providers;

use Illuminate\Support\ServiceProvider;
use ActivismeBe\Composers\AccountComposer;
use ActivismeBe\Composers\CityMonitorComposer;

/**
 * Class ViewComposerServiceProvider 
 * 
 * @package ActivismeBe\Providers
 */
class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap view composers.
     *
     * @return void
     */
    public function boot(): void
    {
        view()->composer('*', AccountComposer::class);
        view()->composer('city-monitor.*', CityMonitorComposer::class);
    }
}
