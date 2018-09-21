<?php

namespace ActivismeBe\Http\Controllers\Account;

use Illuminate\View\View;
use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;

/**
 * Class SettingsController 
 * 
 * @package ActivismeBe\Http\Controllers\Account
 */
class SettingsController extends Controller
{
    /**
     * SettingsController constructor 
     * 
     * @return void
     */
    public function __construct() 
    {
        $this->middleware(['auth']);
    }

    /**
     * Get the account information settings page. 
     * 
     * @param  Request $request The request information collection bag. 
     * @return View
     */
    public function index(Request $request): View
    {
        switch ($request->type) {
            case 'security': return view('account.settings.security');
            default:         return view('account.settings.information');
        } 
    }

    public function updateSecurity(): RedirectResponse 
    {

    }

    public function updateInformation(): RedirectResponse 
    {
        
    }
}
