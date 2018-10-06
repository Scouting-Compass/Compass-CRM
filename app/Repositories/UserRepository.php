<?php 

namespace ActivismeBe\Repositories; 

use ActivismeBe\Traits\FlashMessage;
use ActivismeBe\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

/**
 * Class UserRepository
 * 
 * @package ActivismeBe\Repositories
 */
class UserRepository extends Authenticatable
{
    use FlashMessage;

    /**
     * Function for processing delete request from users.
     *
     * @throws \Exception instance of ModelNotFoundException when the user is not found.
     *
     * @param  Request $request The request information collection bag.
     * @param  User $user The resource entity from the given user.
     * @return void
     */
    public function processDeleteRequest(Request $request, User $user): void
    {
        $undoLink = '<a href="'. route('users.delete.undo', $user) .'">undo</a>';

        if ($this->isValidConfirmation($request) && $user->delete()) { // Confirmation is valid && User has been deleted in the system.
            $this->flashWarning("The login for {$user->name} has been deleted. {$undoLink}")->important();
        }
    }

    /**
     * Confirm that the value from the confirmation input is the same as the auth user his password. 
     * 
     * @param  Request $request The request information collection bag. 
     * @return bool
     */
    private function isValidConfirmation(Request $request): bool
    {
        return Hash::check($request->confirmation, auth()->user()->getAuthPassword());
    }
}