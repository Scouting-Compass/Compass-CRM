<?php 

namespace ActivismeBe\Composers;

use Illuminate\View\View;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class AccountComposer 
 * 
 * @package ActivismeBe\Composer
 */
class AccountComposer 
{
    /**
     * The guard implementation. 
     * 
     * @var Guard $auth
     */
    protected $auth;

    /**
     * AccountComposer constructor 
     * 
     * @param  Guard $auth Variable for accessing the data from the auth user.
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Method for binding to the view. 
     * 
     * @param  View $view The builer instance for the blade view.
     * @return void
     */
    public function compose(View $view): void 
    {
        if ($this->auth->check()) {
            $view->with('authUser', $this->auth->user());
        }
    }
}