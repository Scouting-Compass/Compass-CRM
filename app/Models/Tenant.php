<?php

namespace ActivismeBe\Models;

use Illuminate\Database\Eloquent\Model;
use ActivismeBe\User;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};

/**
 * Class Tenant 
 * 
 * @package ActivismeBe\Models
 */
class Tenant extends Model
{
    /**
     * Mass-assign fields for the database storage table. 
     * 
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'phone_number'];

    /**
     * Data relation for accessing creator information. 
     * 
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault(['name' => 'unknown']);
    }

    /**
     * Collection with all the leases + information from the tenant. 
     * 
     * @return HasMany
     */
    public function leases(): HasMany 
    {
        return $this->hasMany(Lease::class);
    }

    /**
     * Get the tenant's name.
     * 
     * @return string
     */
    public function getNameAttribute(): string
    {
        return "{$this->firstname} {$this->lastname}";
    }
}
