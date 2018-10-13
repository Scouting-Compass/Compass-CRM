<?php

namespace ActivismeBe\Http\Controllers\StadsMonitor\Back\Status;

use ActivismeBe\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class PendingController
 *
 * @package ActivismeBe\Http\Controllers\StadsMonitor\Back\Status
 */
class PendingController extends Controller
{
    /**
     * PendingController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified', 'auth', 'forbid-banned-user']);
    }

    /**
     * Warning view for setting a city to pending.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @param  City $city The resource entity from the given city.
     * @return View
     */
    public function edit(City $city): View
    {
        $this->authorize('is-pending', $city);
        return view();
    }

    public function update(City $city): RedirectResponse
    {

    }
}
