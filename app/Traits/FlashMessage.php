<?php 

namespace ActivismeBe\Traits;

use Laracasts\Flash\FlashNotifier;
 

/**
 * Trait FlashMessage
 * 
 * @package ActivismeBe\Traits
 */
trait FlashMessage
{
    /**
     * Flash a message. 
     * 
     * @param  string $title    The title for the flash message. 
     * @param  string $message  The actual flash message
     * @return FlashNotifier
     */
    public function flashMessage(string $title, string $message): FlashNotifier
    {
        return flash("<strong>{$title}</strong> {$message}");
    }

    /**
     * Flash an success message. 
     * 
     * @param  string $message  The actual flash message. 
     * @param  string $title    The title for the flash message defaults to "Success!"
     * @return FlashNotifier
     */
    public function flashSuccess(string $message, string $title = 'Success!'): FlashNotifier 
    {
        return $this->flashMessage($title, $message)->success();
    }

    /**
     * Flash an error message.
     *
     * @param  string $message  The actual flash message.
     * @param  string $title    The title for the flash message defaults to "Danger!"
     * @return FlashNotifier
     */
    public function flashDanger(string $message, string $title = 'Danger!'): FlashNotifier
    {
        return $this->flashMessage($title, $message)->error();
    }

    /**
     * Flash an warning message.
     *
     * @param  string $message  The actual flash message.
     * @param  string $title    The title for the flash message defaults to "Warning!"
     * @return FlashNotifier
     */
    public function flashWarning(string $message, string $title = 'Warning!'): FlashNotifier
    {
        return $this->flashMessage($title, $message)->warning();
    }

    /**
     * Flash an information message.
     *
     * @param  string $message  The actual flash message.
     * @param  string $title    The title for the flash message defaults to "Info!"
     * @return FlashNotifier
     */
    public function flashInfo(string $message, string $title = 'Info!'): FlashNotifier
    {
        return $this->flashMessage($title, $message)->warning();
    }
}