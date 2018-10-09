<?php

namespace ActivismeBe\Http\Controllers\Contact;

use ActivismeBe\Http\Requests\ContactValidator;
use Illuminate\Http\RedirectResponse;
use ActivismeBe\Http\Controllers\Controller;

/**
 * Class IndexController
 * ----
 * View is only defined in the frontend routes file. Mainly because it is a static view.
 * That doesn't require any data from the storage.
 *
 * @package ActivismeBe\Http\Controllers\Contact
 */
class IndexController extends Controller
{
    /**
     * Method for sending the contact form the the configured mail address.
     *
     * @todo Build up the controller logic
     * @todo Build up the validation class
     *
     * @param  ContactValidator $input The form request class that handles the validation logic.
     * @return RedirectResponse
     */
    public function send(ContactValidator $input): RedirectResponse
    {
        //
    }
}
