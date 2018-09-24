<?php

namespace ActivismeBe\Http\Controllers\Calendar;

use Illuminate\View\View;
use Illuminate\Http\{Request, RedirectResponse};
use ActivismeBe\Http\Controllers\Controller;
use ActivismeBe\Models\Lease;
use ActivismeBe\Http\Requests\LeaseValidator;

/**
 * Class DashboardController
 * 
 * @package ActivismeBe\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * DashboardController constructor 
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'forbid-banned-user']);
        $this->authorizeResource(Lease::class); // Apply authorization the resource controller functions.
    }

    /**
     * Lease calendar management index page. 
     * 
     * @see \ActivismeBe\Policies\LeasePolicy::viewDashboard()
     * 
     * @param  Lease $leases Variable for all the lease resources from the storage.
     * @return View
     */
    public function index(Lease $leases): View
    {
        // For a strange way is the index authorization checker not included in the resource binding. 
        $this->authorize('view-dashboard', $leases); // Check that the auth user can view the calendar page or not. 

        return view('calendar.dashboard', ['leases' => $leases->simplePaginate(15)]);
    }

    /**
     * Create a new domain lease in the application. 
     * 
     * @see \ActivismeBe\Policies\LeasePolicy::create()
     * 
     * @return View
     */
    public function create(): View 
    {
        return view('calendar.create');
    }

    /**
     * Store a new lease in the application
     * 
     * @param  LeaseValidator $input The form request data validator. 
     * @param  Lease          $lease The storage entity model for the leases.
     * @return RedirectResponse
     */
    public function store(LeaseValidator $input, Lease $lease): RedirectResponse
    {
        if ($lease = $lease->store($input)) {
            /** @todo Implement flash message */
            /** @todo Implement database notification to notify other users. */
        }

        return redirect()->route('calendar.index');
    }
}
