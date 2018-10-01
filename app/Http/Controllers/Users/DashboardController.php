<?php

namespace ActivismeBe\Http\Controllers\Users;

use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use ActivismeBe\User;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use ActivismeBe\Http\Requests\Account\InformationValidator;
use Mpociot\Reanimate\ReanimateModels;

/**
 * Class DashboardController 
 * 
 * @package ActivismeBe\Http\Controllers\Users
 */
class DashboardController extends Controller
{
    use ReanimateModels; 

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
        $this->middleware(['can:not-auth-user,user'])->only(['undoDeleteRoute', 'destroy']);

        $this->users = $users;
    }

    /**
     * Get the index panel for all the users in the application. 
     * 
     * @param  Request $request The request information bag for filtering users. 
     * @return View
     */
    public function index(Request $request): View
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
     * @param  Role $role The resource model for the ACL roles storage. 
     * @return View
     */
    public function create(Role $role): View 
    {
        $roles = $role->pluck('name', 'name'); // Duplicate attribute because the value in the form is not an integer.
        return view('users.create', compact('roles'));
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
     * Method for creating a new user in the application. 
     * 
     * @param  InformationValidator $input  The form request class that handles all the validation logic. 
     * @param  User                 $user   The resource model from the storage. 
     * @return RedirectResponse
     */
    public function store(InformationValidator $input, User $user): RedirectResponse
    {
        $input->merge(['password' => str_random(16)]); // Bind the generated password to the input.

        if ($user = $user->create($input->all())->assignRole($input->role)) {
            if (! is_null($input->email_verified_at)) { // User needs to verify his/her user account
                $user->update(['email_verified_at' => now()]);
            }    

            $this->flashSuccess("There is create a login for {$user->name}.")->important();
        }    

        return redirect()->route('users.create');
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
        if ($request->method() === 'GET') {
            return view('users.delete', compact('user'));
        }

        // Method is not indentified as GET request DELETE
        $this->validate($request, ['confirmation' => 'required']); // Confirm that the confirmation field is filled in.

        $user->processDeleteRequest($request, $user);
        return redirect()->route('users.index');
    }

    /**
     * Undo the delete for the user in the application.
     * 
     * @param  int $userIdentifier The unique identitifer from the user (storage: primary key)
     * @return RedirectResponse
     */
    public function undoDeleteRoute(int $userIdentifier): RedirectResponse 
    {
        $this->flashInfo('The login has been restored');
        return $this->restoreModel($userIdentifier, new User(), 'users.index');
    }
}
