<?php

namespace ActivismeBe\Http\Controllers\Users;

use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use ActivismeBe\User;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

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

    /**
     * Create view for a new user in the application. 
     *
     * @return View
     */
    public function create(): View 
    {
        return view('users.create');
    }

    /**
     * Get the create page for a new user in the application. 
     * 
     * @param  User $user The resource entity from the user.
     * @return View
     */
    public function show(User $user): View 
    {
        return view('users.show', compact('user'));
    }

    /**
     * Delete an user in the application. 
     * 
     * @param  Request  $request The request information collection bag.
     * @param  User     $user    The resource entity from the storage. 
     * @return View|RedirectResponse
     */
    public function destroy(Request $request, User $user)
    {
        if ($request->method()) {
            return view('users.delete', compact('user'));
        }

        // Method is not indentified as GET request DELETE
    }
}
