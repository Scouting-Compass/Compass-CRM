<?php

namespace ActivismeBe\Http\Controllers\StadsMonitor\Back;

use Illuminate\View\View;
use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use ActivismeBe\Models\City;

/**
 * Class IndexController
 * 
 * @package ActivismeBe\Http\Controllers\StadsMonitor\Back
 */
class IndexController extends Controller
{
    /**
     * IndexController Constructor 
     * 
     * @return void
     */
    public function __construct() 
    {
        $this->middleware(['verified', 'auth', 'forbid-banned-user']);
    }

    /**
     * Backend dashboard for city monitor.
     *
     * @see \ActivismeBe\Policies\CityPolicy::view()
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException When the user can't access the city monitor.
     *
     * @param  City $cities The resource model for the city entities.
     * @return View
     */
    public function index(City $cities): View
    {
        $this->authorize('view', $cities); // Check if the user has authorization to view the dashboard. 
        return view('city-monitor.back.index', ['cities' => $cities->simplePaginate()]);
    }
}
