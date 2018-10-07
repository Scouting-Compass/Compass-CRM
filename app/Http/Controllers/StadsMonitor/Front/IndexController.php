<?php

namespace ActivismeBe\Http\Controllers\StadsMonitor\Front;

use ActivismeBe\Models\City;
use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class IndexController
 *
 * @package ActivismeBe\Http\Controllers\StadsMonitor\Front
 */
class IndexController extends Controller
{
    /**
     * Get the frontend index page from the city monitor.
     *
     * @param  City $cities The resource model for the cities in the application.
     * @return View
     */
    public function index(City $cities): View
    {
        return view('city-monitor.front.index', ['cities' => $cities->simplePaginate()]);
    }

    /**
     * Show the information for a specific city in the nuclear watch. 
     * 
     * @param  City $city The resource entity from the storage.
     * @return View
     */
    public function show(City $city): View 
    {
        return view('city-monitor.front.show', compact('city'));
    }
}
