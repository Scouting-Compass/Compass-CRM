<?php

namespace ActivismeBe\Http\Controllers\Support\Front;

use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class SupportController
 *
 * @package ActivismeBe\Http\Controllers\Support\Front
 */
class SupportController extends Controller
{
    /**
     * The frontend index page for the campaign support.
     *
     * @param  Request $request The request information instance.
     * @return View
     */
    public function index(Request $request): View
    {
        if (in_array($request->type, ['organization', 'financial'])) {
            return view("support.front.{$request->type}");
        }

        // Default individual support vies.
        return view('support.front.individual');
    }
}
