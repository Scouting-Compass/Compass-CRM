<?php

namespace ActivismeBe\Http\Controllers\Articles\Back;

use ActivismeBe\Models\Article;
use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class IndexController
 *
 * @package ActivismeBe\Http\Controllers\Articles\Back
 */
class IndexController extends Controller
{
    /**
     * IndexController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'role:admin|writer']);
    }

    /**
     * Get the backend management console for news articles.
     *
     * @param  Article $articles The resource model for the news articles.
     * @return View
     */
    public function index(Article $articles): View
    {
        return view('articles.back.index', ['articles' => $articles->simplePaginate()]);
    }
}
