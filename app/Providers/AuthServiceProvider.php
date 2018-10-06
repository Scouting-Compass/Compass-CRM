<?php

namespace ActivismeBe\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use ActivismeBe\User;
use ActivismeBe\Models\City;
use ActivismeBe\Policies\{UserPolicy, CityPolicy};

/**
 * Class AuthServiceProvider 
 * 
 * @package ActivismeBe\Providers
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class, City::class => CityPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
