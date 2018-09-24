<?php 

namespace ActivismeBe\Repositories; 

use ActivismeBe\Http\Requests\LeaseValidator;
use Illuminate\Database\Eloquent\Model;
use ActivismeBe\Models\Lease;
use ActivismeBe\Models\Tenant;

/**
 * Class LeaseRepository 
 * 
 * @package ActivismeBe\Repositories
 */
class LeaseRepository extends Model
{
    /**
     * Store the tenant and lease in the database.
     * 
     * @param  LeaseValidator $lease The form request input from the lease form.
     * @return Lease
     */
    public function store(LeaseValidator $input): Lease
    {
        if ($lease  = $this->writeLeaseToStorage($input->all())) {
            $tenant = Tanant::findOrCreate(['email' => $input->email], $input->all());
            $lease->tenant()->associate($tenant)->save();
        }

        return $lease;
    }
}