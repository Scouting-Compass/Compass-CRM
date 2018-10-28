<?php

namespace ActivismeBe\Http\Controllers\StadsMonitor\Back;

use ActivismeBe\Models\City;
use Illuminate\Http\{RedirectResponse, Request};
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\View\View;
use ActivismeBe\Http\Requests\CityMonitor\NotationValidator;
use ActivismeBe\Models\Notation;
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

    /**
     * Store method for creating and attaching the notation. 
     * 
     * @param  NotationValidator $input The form request class that handles the validation. 
     * @param  City              $city  The city resource entity from the storage. 
     * @return RedirectResponse
     */
    public function store(NotationValidator $input, City $city): RedirectResponse 
    {
        $notation = new Notation($input->all()); // TODO Implement Observer for the creator attachment
        
        if ($city->notations()->save($notation)) {
            $this->flashInfo("The notation for {$city->name} has been added.");
        }

        return redirect()->route('city-monitor.front.show', $city);
    }
}
