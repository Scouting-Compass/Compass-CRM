<?php

namespace ActivismeBe\Http\Controllers\StadsMonitor\Back;

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
     * @return View
     */
    public function create(): View
    {
        return view('notation.create');
    }
}
