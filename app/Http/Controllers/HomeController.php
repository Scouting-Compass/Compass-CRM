<?php

namespace ActivismeBe\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class HomeController 
 * 
 * @package ActivismeBe\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified', 'auth', 'forbid-banned-user'])->only(['home']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
