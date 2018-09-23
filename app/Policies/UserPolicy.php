<?php

namespace ActivismeBe\Policies;

use ActivismeBe\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class UserPolicy 
 * 
 * @package ActivismeBe\Policies
 */
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is not the samen as the authenticated user.
     *
     * @param  User  $authUser
     * @param  User  $user
     * @return bool
     */
    public function notAuthUser(User $authUser, User $user): bool
    {
        return $authUser->id !== $user->id;
    }
}
