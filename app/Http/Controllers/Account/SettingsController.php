<?php

namespace ActivismeBe\Http\Controllers\Account;

use Illuminate\View\View;
use Illuminate\Http\{Request, RedirectResponse};
use ActivismeBe\Http\Controllers\Controller;
use ActivismeBe\Http\Requests\Account\SecurityValidator;
use Illuminate\Contracts\Auth\Guard;
use ActivismeBe\Http\Requests\Account\InformationValidator;

/**
 * Class SettingsController 
 * 
 * @package ActivismeBe\Http\Controllers\Account
 */
class SettingsController extends Controller
{
    /**
     * The autentication guard. 
     * 
     * @var Guard $auth
     */
    protected $auth; 
    
    /**
     * SettingsController constructor 
     * 
     * @param  Guard $auth The variable for access the authentication data.
     * @return void
     */
    public function __construct(Guard $auth) 
    {
        $this->middleware(['auth']);
        $this->auth = $auth;
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

    /**
     * Update the authencated user his security settings.
     * 
     * @param  SecurityValidator $input The form request class that handles the validation.
     * @return RedirectResponse
     */
    public function updateSecurity(SecurityValidator $input): RedirectResponse 
    {
        $user = $this->auth->user(); 

        if ($user->update($input->all())) { 
            $this->auth->logoutOtherDevices($user->password);
            $this->flashSuccess('Your account security information has been updated!')->important();
        }

        return redirect()->route('user.settings', ['type' => 'security']);
    }

    /**
     * Update theauthenticated user his account information. 
     * 
     * @todo Build up the validation class -> IN PROGRESS.
     * 
     * @param  InformationValidator $input The form request class that handles the validation.
     * @return RedirectResponse
     */
    public function updateInformation(InformationValidator $input): RedirectResponse 
    {
        if ($this->auth->user()->update($input->all())) {
            $this->flashSuccess('Your account information has been updated!')->important();
        }

        return redirect()->route('user.settings');
    }
}
