<?php

namespace ActivismeBe\Policies;

use ActivismeBe\User;
use ActivismeBe\Models\Lease;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeasePolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user->hasRole('crap');
    }

    /**
     * Determine whether the user can view the lease.
     *
     * @param  \ActivismeBe\User  $user
     * @param  \ActivismeBe\ModelsLease  $lease
     * @return mixed
     */
    public function view(User $user, Lease $lease)
    {
        return true;
    }

    /**
     * Determine whether the user can create models leases.
     *
     * @param  \ActivismeBe\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the models lease.
     *
     * @param  \ActivismeBe\User  $user
     * @param  \ActivismeBe\ModelsLease  $modelsLease
     * @return mixed
     */
    public function update(User $user, ModelsLease $modelsLease)
    {
        //
    }

    /**
     * Determine whether the user can delete the models lease.
     *
     * @param  \ActivismeBe\User  $user
     * @param  \ActivismeBe\ModelsLease  $modelsLease
     * @return mixed
     */
    public function delete(User $user, ModelsLease $modelsLease)
    {
        //
    }
}
