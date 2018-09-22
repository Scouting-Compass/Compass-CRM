<?php

namespace ActivismeBe\Http\Controllers\Users;

use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use ActivismeBe\User;

/**
 * Class DashboardController 
 * 
 * @package ActivismeBe\Http\Controllers\Users
 */
class DashboardController extends Controller
{
    /**
     * Holds the users model
     *
     * @var User $users
     */
    protected $users;

    /**
     * DashboardController Constructor 
     * 
     * @param  User $users The resource model for the resource storage.
     * @return void 
     */
    public function __construct(User $users) 
    {
        $this->middleware(['verified', 'auth', 'role:admin', 'forbid-banned-user']);
        $this->users = $users;
    }

    /**
     * Get the index panel for all the users in the application. 
     * 
     * @param  Request $request The request information bag for filtering users. 
     * @return View
     */
    public function index(Request $request, User $users): View
    {
        switch ($request->get('filter')) {
            case 'deactivated': $users = $this->users->deactivatedUsers(); break; 
            case 'deleted':     $users = $this->users->deletedUsers();     break;
            case 'admin':       $users = $this->users->adminUsers();       break;

            default: $users = $this->users; break; //! No valid filter is given or the user wants all the users.
        }

        return view('users.dashboard', ['users' => $users->simplePaginate(15)]);
    }
}
