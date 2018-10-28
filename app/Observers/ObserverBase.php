<?php

namespace ActivismeBe\Observers;

use Illuminate\Contracts\Auth\Guard;

/**
 * Class ObserverBase 
 * 
 * @package ActivismeBe\Observers
 */
class ObserverBase 
{
    /**
     * The Guard implementation.
     *
     * @var Guard $auth
     */
    protected $auth;

    /**
     * LogLastUserActivity constructor
     *
     * @param  Guard $auth The authentication guard implementation.
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
}