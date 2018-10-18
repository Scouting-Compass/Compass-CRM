<?php

namespace ActivismeBe\Http\Controllers\Articles\Back;

use ActivismeBe\Http\Requests\Articles\ArticleValidator;
use ActivismeBe\Models\Article;
use Illuminate\Http\RedirectResponse;
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

    /**
     * Create view for a new article in the storage.
     *
     * @return View
     */
    public function create(): View
    {
       return view('articles.back.create');
    }

    /**
     * Function for storing the news articles in the storage.
     *
     * @todo Build up the validator ->  IN PROGRESS
     *
     * @param  ArticleValidator $input The form request class that holds all the request information.
     * @return RedirectResponse
     */
    public function store(ArticleValidator $input): RedirectResponse
    {
        if ($articles = new Article($input->all())) {
            $articles->author()->associate($input->user())->save();
            $this->flashInfo('The news articles has been created');
        }

        return redirect()->route('articles.back.index');
    }

    /**
     * Search for a specific news article in the storage.
     *
     * @todo Implement route
     *
     * @param  Request $request  The information instance that holds all the data about the request.
     * @param  Article $articles The resource entity form the storage model.
     * @return View
     */
    public function search(Request $request, Article $articles): View
    {
        $articles = $articles->query()->search($request->term)->simplePaginate();
        return view('articles.back.index', compact('articles'));
    }
}
