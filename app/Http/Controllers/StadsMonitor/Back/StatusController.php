<?php

namespace ActivismeBe\Http\Controllers\StadsMonitor\Back;

use ActivismeBe\Http\Requests\CityMonitor\CharterValidator;
use ActivismeBe\Models\City;
use Illuminate\Http\{RedirectResponse, Request};
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

/**
 * Class StatusController
 *
 * Controller for the city charter status.
 *
 * @package ActivismeBe\Http\Controllers\StadsMonitor\Back
 */
class StatusController extends Controller
{
    /**
     * StatusController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'forbid-banned-user']);
        $this->authorizeResource(City::class);
    }

    /**
     * Create view when a city accept the nuclear free chapter.
     *
     * @todo Register route
     *
     * @param  City $city The resource entity from the storage.
     * @return View
     */
    public function create(City $city): View
    {
        return view('city-monitor.back.status.accept', compact($city));
    }

    /**
     * Register the accept charter status for the given city.
     *
     * @todo Register route
     *
     * @param  CharterValidator $input The request class that handles the form validation
     * @param  City             $city  The resource entity from the storage.
     * @return RedirectResponse
     */
    public function store(CharterValidator $input, City $city): RedirectResponse
    {
        // TODO: Implement controller logic.
        // TODO: Implement media collection logic.

        return redirect()->route('city-monitor.front.show', $city);
    }

    /**
     * Delete the nuclear chapter in the storage.
     *
     * @throws \Spatie\ModelStatus\Exceptions\InvalidStatus Triggered when no valid status is found in the application
     *
     * @param  Request $request The request class that holds all the request information and params.
     * @param  City $city The resource entity from the storage.
     * @return View|RedirectResponse
     */
    public function destroy(Request $request, City $city)
    {
        if ($request->isMethod('GET')) { // Method is GET request so display a view for extra security
            return view('city-monitor.back.status.delete', compact('city'));
        }

        // The request type is DELETE so move on with the delete chapter logic.
        $this->validate($request, ['confirmation' => 'string|required']);

        if (Hash::check($request->confirmation, auth()->user()->getAuthPassword())) {
            $city->setStatus('rejected', 'Registered by ' . $request->user()->name);
            $city->clearMediaCollection('chapters');

            $this->flashInfo("{$city->name} is now registered as a city that rejected the chapter");
        }

        return redirect()->route('city-monitor.back.index', $city);

    }
}
