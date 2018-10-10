<?php

namespace ActivismeBe\Models;

use ActivismeBe\Repositories\CityRepository;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\ModelStatus\HasStatuses;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class City 
 * 
 * @package ActivismeBe\Models
 */
class City extends CityRepository implements HasMedia
{
    use HasStatuses, HasMediaTrait;
    
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
