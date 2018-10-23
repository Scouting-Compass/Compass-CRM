<?php

namespace ActivismeBe\Models;

use ActivismeBe\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Page
 *
 * @package ActivismeBe\Models
 */
class Page extends Model
{
    /**
     * Mass-assign fields for the storage table.
     *
     * @var array
     */
    protected $fillable = ['slug', 'title', 'content'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Data relation for the information who last edited the page.
     *
     * @return BelongsTo
     */
    public function lastEditor(): BelongsTo
    {
       return $this->belongsTo(User::class)->withDefault(['name' => 'unknown']);
    }
}
