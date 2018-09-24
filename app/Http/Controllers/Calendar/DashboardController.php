<?php

namespace ActivismeBe\Http\Controllers\Calendar;

use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use ActivismeBe\Models\Lease;

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
        $this->authorizeResource(Lease::class); // Apply authorization the resource controller.
    }

    /**
     * Lease calendar management index page. 
     * 
     * @param  Lease $leases Get all the lease resources from the storage.
     * @return View
     */
    public function index(Lease $leases): View
    {
        // For a strange way is the index authorization checker not included in the resource binding. 
        $this->authorize('index'); // Check that the auth user can view the calendar page or not. 

        return view('calendar.index', compact('leases'));
    }
}
