<?php

namespace ActivismeBe\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use ActivismeBe\User;

/**
 * Class Notation 
 * 
 * @package ActivismeBe\Models
 */
class Notation extends Model
{
    /**
     * Mass-assign fields for the resource storage table. 
     * 
     * @return array
     */
    protected $fillable = ['title', 'content'];

    /**
     * Data relation for the information who has created the notation.
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
       return $this->belongsTo(User::class)->withDefault(['name' => 'unknown']);
    }

    /**
     * Data relation for the information from the city that is attached to the notation. 
     * 
     * @return BelongsTo 
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
