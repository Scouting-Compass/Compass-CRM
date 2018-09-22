<?php

namespace ActivismeBe\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Cache;

/**
 * Class LogLastUserActivity
 * 
 * @package ActivismeBe\Http\Middleware
 */
class LogLastUserActivity
{
    /**
     * The Guard implementation.
     *
     * @var Guard $auth
     */
    protected $auth;

    /**
     * LogLastUserActivity constructor 
     * 
     * @param  Guard $auth The authentication guard implementation. 
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->auth->check()) {
            $expiretAt = now()->addMinutes(5);
            Cache::put('user-is-online-' . $this->auth->user()->id, true, $expiretAt);
        }

        return $next($request);
    }
}
