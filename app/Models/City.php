<?php

namespace ActivismeBe\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class City 
 * 
 * @package ActivismeBe\Models
 */
class City extends Model
{
    /**
     * Mass-assign fields for the database table. 
     * 
     * @var array
     */
    protected $fillable = ['postal', 'name', 'lat', 'lng'];

    /**
     * Data relation to access the province information from the city.
     * 
     * @return BelongsTo 
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class)->withDefault(['name' => 'unknown']);
    }
}
