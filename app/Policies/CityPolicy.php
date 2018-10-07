<?php

namespace ActivismeBe\Policies;

use ActivismeBe\User;
use ActivismeBe\Models\City;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class CityPolicy
 * 
 * @package ActivismeBe\Policies
 */ 
class CityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the cities.
     *
     * @param  User  $user The resource entity from the authenticated user. 
     * @param  City  $city The resource entity from the city or cities
     * @return bool
     */
    public function view(User $user, City $city): bool
    {
        return $user->hasRole('admin');
    }
}
