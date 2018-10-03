<?php

namespace ActivismeBe\Http\Controllers\StadsMonitor\Front;

use ActivismeBe\Models\City;
use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

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
     * @todo Build up the application view.
     *
     * @param  City $cities The resource model for the cities in the application.
     * @return View
     */
    public function index(City $cities): View
    {
        return view('city-monitor.front.index', [
           'cities' => $cities->simplePaginate()
        ]);
    }
}
