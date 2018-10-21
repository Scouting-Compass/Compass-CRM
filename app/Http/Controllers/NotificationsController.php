<?php

namespace ActivismeBe\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class NotificationsController
 *
 * @package ActivismeBe\Http\Controllers
 */
class NotificationsController extends Controller
{
    /**
     * NotificationsController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified', 'auth', 'forbid-banned-user']);
    }

    /**
     * Get the index page for the notifications from the authenticated user.
     *
     * @param  null|string $type The type of notifications that u want to display.
     * @return View
     */
    public function index(?string $type = null): View
    {
        switch ($type) {
            case 'all':
                $notifications = auth()->user()->notifications()->simplePaginate(10);
                $type = 'all';
                break;

            default: // No type parameter given so display unread notifications as default.
                $notifications = auth()->user()->unreadNotifications()->simplePaginate(10);
                $type = 'read';
                break;
        }

        return view('notifications.index', compact('notifications', 'type'));
    }

    /**
     * Mark all the unread notifications for a user as read.
     *
     * @return RedirectResponse
     */
    public function markAsRead(): RedirectResponse
    {
        auth()->user()->unreadNotifications()->maskAsRead();
        return redirect()->back();
    }
}
