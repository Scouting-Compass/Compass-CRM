<?php

namespace ActivismeBe\Http\Controllers\Users;

use Gate;
use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use ActivismeBe\User;
use ActivismeBe\Http\Requests\Users\LockValidator;
use Illuminate\View\View;

/**
 * Class LockController
 * 
 * @package ActivismeBe\Http\Controllers\Users
 */
class LockController extends Controller
{
    /**
     * LockController constructor 
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified', 'auth', 'role:admin', 'forbid-banned-user']);
    }

    /**
     * View for deactivating users in the application. 
     * 
     * @param  User $user The resource entity from the given user.
     * @return View
     */
    public function create(User $user): View 
    {
        $this->authorize('not-auth-user', $user);
        return view('users.deactivate', compact('user'));
    }

    /**
     * Store the user deactivation in the application.
     * 
     * @param  LockValidator $input The form request class that handles the validation.
     * @param  User          $user  The resource entity from the given user.
     * @return RedirectResponse
     */
    public function store(LockValidator $input, User $user): RedirectResponse
    {
        if (Gate::allows('not-auth-user', $user) && $user->ban()) {
            $this->flashDanger("The login for {$user->name} has been deactivated in the application.", 'Success!')->important();
        }

        return redirect()->route('users.index');
    }

    /**
     * Delete the user deactivation in the application. 
     * 
     * @param  User $user The user entity from the storage.
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        return redirect()->route('users.index');
    }
}
