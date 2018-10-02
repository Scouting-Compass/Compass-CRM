<?php

namespace ActivismeBe\Observers;

use ActivismeBe\User;

/**
 * Class UserObserver
 * 
 * @package ActivismeBe\Observers
 */
class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @todo Implement LoginCreated Notification class.
     * 
     * @param  User  $user The entity from the create user.
     * @return void
     */
    public function created(User $user): void
    {
        $password     = str_random(16);
        $verification = [];

        if (! is_null(request()->email_verified_at)) { // User needs to verify his/her user account
            $verification = ['email_verified_at' => now()];
        }

        $user->update(array_merge($verification, ['password' => $password]));
        $user->notify((new LoginCreated($password))->delay(now()->addMinute()));
    }
}
