<?php

namespace ActivismeBe\Models;

use ActivismeBe\Repositories\LeaseRepository;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Lease
 * 
 * @package ActivismeBe\Lease
 */
class Lease extends LeaseRepository
{
    /**
     * Mass-assign fields for the database storage.
     * 
     * @var array
     */
    protected $fillable = [''];

    /**
     * Data relation for the lease his tenant. (inverse for: Tenant::leases() relation)
     * 
     * @return BelongsTo
     */
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
