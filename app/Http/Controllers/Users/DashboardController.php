<?php

namespace ActivismeBe\Http\Controllers\Users;

use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;

/**
 * Class DashboardController 
 * 
 * @package ActivismeBe\Http\Controllers\Users
 */
class DashboardController extends Controller
{
    /**
     * IndexController constructor 
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified', 'auth']); 
    }
}
