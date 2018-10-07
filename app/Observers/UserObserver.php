<?php

namespace ActivismeBe\Observers;

use ActivismeBe\Notifications\Users\LoginCreated;
use ActivismeBe\User;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class UserObserver
 * 
 * @package ActivismeBe\Observers
 */
class UserObserver
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

    /**
     * Handle the user "created" event.
     * 
     * @param  User  $user The entity from the create user.
     * @return void
     */
    public function created(User $user): void
    {
        if ($this->auth->check() && $this->auth->user()->hasRole('admin')) {
            $password     = str_random(16);
            $verification = [];

            if (! is_null(request()->email_verified_at)) { // User needs to verify his/her user account
                $verification = ['email_verified_at' => now()];
            }

            $user->update(array_merge($verification, ['password' => $password]));
            $user->notify((new LoginCreated($password))->delay(now()->addMinute()));
        }
    }
}
