<?php

namespace ActivismeBe\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Article
 * 
 * @package ActivismeBe\Models
 */
class Article extends Model
{
    /**
     * Mass-assign fields for the database storage table. 
     * 
     * @return array
     */
    protected $fillable = [];

    public function author(): BelongsTo
    {
        
    }
}
