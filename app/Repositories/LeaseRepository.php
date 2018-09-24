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
        if ($lease  = $this->create($input->all())) {
            $tenant = Tenant::firstOrCreate(['email' => $input->email], $input->all());
            $tenant->creator()->associate($input->user())->save();
            $tenant->leases()->save($lease);
        }

        return $lease;
    }
}