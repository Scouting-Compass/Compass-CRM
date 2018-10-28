<?php

namespace ActivismeBe\Http\Controllers\StadsMonitor\Back;

use ActivismeBe\Models\City;
use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class NotationController
 *
 * @package ActivismeBe\Http\Controllers\StadsMonitor\Back
 */
class NotationController extends Controller
{
    /**
     * NotationController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'forbid-banned-user', 'role:admin']);
    }

    /**
     * The create view for a new notation in the application.
     *
     * @param  City $city The resource entity for the city that belongs to the notation.
     * @return View
     */
    public function create(City $city): View
    {
        return view('notation.create', compact('city'));
    }
}
