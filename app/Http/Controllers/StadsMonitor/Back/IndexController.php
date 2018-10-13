<?php

namespace ActivismeBe\Http\Controllers\StadsMonitor\Back;

use Illuminate\View\View;
use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use ActivismeBe\Models\City;
use Spatie\MediaLibrary\Models\Media;

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
     * Show a specific chapter in the application.
     *
     * @todo Register route
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @param  Media $media The entity from the charter (PDF file) in the storage
     * @return Media
     */
    public function show(Media $media): Media
    {
        $this->authorize('view-chapter', $media);
        return $media; // Return the whole entity from the chapter
    }

    /**
     * Backend dashboard for city monitor.
     *
     * @see \ActivismeBe\Policies\CityPolicy::view()
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException When the user can't access the city monitor.
     *
     * @param  Request $request The information instance that holds the request data.
     * @param  City $cities The resource model for the city entities.
     * @return View
     */
    public function index(Request $request, City $cities): View
    {
        $this->authorize('view', $cities); // Check if the user has authorization to view the dashboard.
        $cities = $cities->query();

        if (in_array($request->get('filter'), ['accepted', 'pending', 'rejected'])) {
            // Apply criteria to the resource model query.
            $cities->currentStatus($request->get('filter'));
        }

        return view('city-monitor.back.index', ['cities' => $cities->simplePaginate()]);
    }
}
