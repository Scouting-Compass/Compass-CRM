<?php

namespace ActivismeBe\Models;

use ActivismeBe\Repositories\CityRepository;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
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
    use HasStatuses, HasMediaTrait, Searchable;
    
    /**
     * Mass-assign fields for the database table. 
     * 
     * @var array
     */
    protected $fillable = ['postal', 'name', 'lat', 'lng', 'charter_code'];

    /**
     * Data relation to access the province information from the city.
     * 
     * @return BelongsTo 
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class)->withDefault(['name' => 'unknown']);
    }

    /**
     * Function for attaching the nuclear free statement to the city.
     *
     * @return void
     */
    public function uploadStatementFile(): void
    {
        $this->addMediaFromRequest('statement')
            ->usingFileName("charter-{$this->id}")
            ->toMediaCollection("city-{$this->id}", 'media');
    }

    /**
     * Set the status for the city to accepted
     *
     * @throws \Spatie\ModelStatus\Exceptions\InvalidStatus
     *
     * @param  string $username The name from the user who performed the action.
     * @return void
     */
    public function setStatusToAccept(string $username): void
    {
        if ($this->update(['charter_code' => 'A'])) {
            $this->status()->delete();
            $this->setStatus('accepted', 'Registered by ' . $username);
        }
    }
}
