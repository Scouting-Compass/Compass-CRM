<?php

namespace ActivismeBe\Http\Controllers\Premises;

use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;

/**
 * Class IndexController
 * 
 * @package ActivismeBe\Http\Controllers\Premises
 */
class IndexController extends Controller
{
    /**
     * IndexController constructor 
     * 
     * @return void
     */
    public function __construct() 
    {
        $this->middleware(['auth', 'forbid-banned-user']);
    }

    /**
     * @return View
     */
    public function index(): View 
    {
        return view(); 
    }
}
