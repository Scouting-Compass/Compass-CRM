<?php

namespace ActivismeBe\Http\Controllers;

use ActivismeBe\Http\Requests\PageValidator;
use ActivismeBe\Models\Page;
use Illuminate\Http\{Request, RedirectResponse};
use Illuminate\View\View;

/**
 * Class PagesController
 *
 * @package ActivismeBe\Http\Controllers
 */
class PagesController extends Controller
{
    /**
     * PagesController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified', 'auth', 'role:admin', 'forbid-banned-user'])->except(['show']);
    }

    /**
     * Display all the page fragments in the application.
     *
     * @param  Page $pages The resource entity for the pages in the application.
     * @return View
     */
    public function index(Page $pages): View
    {
        return view('fragments.index', ['pages' => $pages->simplePaginate()]);
    }

    /**
     * Edit view for a page fragment.
     *
     * @param  Page $page The resource entity from the page u want to edit.
     * @return View
     */
    public function edit(Page $page)
    {
        return view('fragments.edit', compact('page'));
    }

    /**
     * Update function for a page fragment in the application.
     *
     * @todo Build up the validation class -> IN PROGRESS
     *
     * @param  PageValidator    $input  The form request class that handles the validation.
     * @param  Page             $page   The page resource entity that you want to update.
     * @return RedirectResponse
     */
    public function update(PageValidator $input, Page $page): RedirectResponse
    {
        if ($page->update($input->all())) { // Page fragment has been updated in the storage.
            $page->lastEditor()->associate($input->user())->save();
            $this->flashInfo("The page fragment ({$page->title}) has been updated");
        }

        return redirect()->route('fragments.index');
    }
}
