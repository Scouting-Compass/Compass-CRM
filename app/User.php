<?php

namespace ActivismeBe;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use ActivismeBe\Scopes\UserScopes;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, UserScopes, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Method for salting the password in the database
     * 
     * @param  string $password The given or generated password from the application/form 
     * @return void
     */
    public function setPasswordAttribute(string $password): void 
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
