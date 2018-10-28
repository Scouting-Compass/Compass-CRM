<?php

namespace ActivismeBe\Models;

use Illuminate\Database\Eloquent\Model;

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
}
