<?php

namespace ActivismeBe\Http\Controllers\Contact;

use ActivismeBe\Http\Requests\ContactValidator;
use ActivismeBe\Mail\SendContactMail;
use Illuminate\Http\RedirectResponse;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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
     * @param  ContactValidator $input The form request class that handles the validation logic.
     * @return RedirectResponse
     */
    public function send(ContactValidator $input): RedirectResponse
    {
        Mail::to(config('platform.contact.email'))->queue(new SendContactMail($input->all()));

        $this->flashInfo(
            'Thanks for sending us your question. We will answer as soon as possible.',
            '<i class="fe fe-check mr-1"></i> Thank you for contacting us.'
        );

        return redirect()->route('contact');
    }
}
