<?php

namespace ActivismeBe\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Province 
 * 
 * @package ActivismeBe\Models
 */
class Province extends Model
{
    /**
     * Mass-assign fields for the database model. 
     */
    protected $filleable = ['name'];
}
