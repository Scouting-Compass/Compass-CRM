<?php

namespace ActivismeBe;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Scout\Searchable;
use Spatie\Permission\Traits\HasRoles;
use ActivismeBe\Scopes\UserScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Support\Facades\Cache;
use ActivismeBe\Repositories\UserRepository;

class User extends UserRepository implements MustVerifyEmail, BannableContract
{
    use Notifiable, HasRoles, UserScopes, SoftDeletes, Bannable, Searchable;

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
     * Determine if the user is online or not. 
     * 
     * @return bool
     */
    public function isOnline(): bool
    {
        return Cache::has('user-is-online-' . $this->id);
    }

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
