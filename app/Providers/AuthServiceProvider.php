<?php

namespace ActivismeBe\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use ActivismeBe\User;
use ActivismeBe\Policies\UserPolicy;
use ActivismeBe\Models\Lease;
use ActivismeBe\Policies\LeasePolicy;

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
        User::class => UserPolicy::class, 
        Lease::class => LeasePolicy::class,
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
