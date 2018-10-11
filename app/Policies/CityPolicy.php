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
     * @return bool
     */
    public function view(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can view the accept chapter page.
     *
     * @param  User  $user The resource entity from the authenticated user.
     * @param  City  $city The resource entity from the given city.
     * @return bool
     */
    public function create(User $user, City $city): bool
    {
        return $user->hasRole('admin') && $city->charter_code === 'P' || $city->charter_code === 'R';
    }

    /**
     * Determine whether the user can remove or set the status to rejected on a city.
     *
     * @param  User $user The resource entity from the authenticated user.
     * @param  City $city The resource entity from the given city.
     * @return bool
     */
    public function delete(User $user, City $city): bool
    {
        return $user->hasRole('admin') && $city->charter_code === 'A';
    }

    /**
     * Determine whether the user can view the signed chapter of the city or not.
     *
     * @param  User $user
     * @param  City $city
     * @return bool
     */
    public function viewChapter(User $user, City $city): bool
    {
        return $user->hasRole('admin') && $city->currentStatus('accepted');
    }
}
