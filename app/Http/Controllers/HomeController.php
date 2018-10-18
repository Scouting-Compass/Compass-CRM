<?php

namespace ActivismeBe\Http\Controllers;

use ActivismeBe\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
     * Show the application welcome page.
     * 
     * @return View
     */
    public function indexFront(Article $articles): View
    {
        $articles = $articles->take(3)->latest()->get();
        return view('welcome', compact('articles'));
    }

    /**
     * Show the admin application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        return view('home');
    }
}
