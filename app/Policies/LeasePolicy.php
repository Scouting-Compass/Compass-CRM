<?php

namespace ActivismeBe\Policies;

use ActivismeBe\User;
use ActivismeBe\Models\Lease;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class LeasePolicy 
 * 
 * @package ActivismeBe\Policies
 */
class LeasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the lease index page. 
     * 
     * @param  User $user The resource entity from the authenticated user.
     * @return bool
     */
    public function viewDashboard(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'leader']);
    }

    /**
     * Determine whether the user can view the lease.
     *
     * @param  User   $user  The resource entity from the authenticated user. 
     * @param  Lease  $lease The resource entity form the lease.  
     * @return bool
     */
    public function view(User $user, Lease $lease): bool
    {
        return $user->hasAnyRole(['admin', 'leader']);
    }

    /**
     * Determine whether the user can create leases.
     *
     * @param  User  $user The resource entity from the authenticated user.
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['admin', 'leader']);
    }

    /**
     * Determine whether the user can update the lease.
     *
     * @param  User   $user  The resource entity from the authenticated user. 
     * @param  Lease  $lease The resource entity form the lease. 
     * @return bool
     */
    public function update(User $user, Lease $modelsLease): bool
    {
        return $user->hasAnyRole(['admin', 'leader']);
    }

    /**
     * Determine whether the user can delete the lease.
     *
     * @param  User   $user  The resource entity from the authenticated user. 
     * @param  Lease  $lease The resource entity form the lease. 
     * @return mixed
     */
    public function delete(User $user, Lease $lease): bool
    {
        return $user->hasAnyRole(['admin', 'leader']);
    }
}
