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
     * @param  string $title    The title for the flash message default to "Success!"
     * @return FlashNotifier
     */
    public function flashSuccess(string $message, string $title = 'Success!'): FlashNotifier 
    {
        return $this->flashMessage("<strong>{$title}</strong>", $message)->success();
    }

    /**
     * Flash an error message. 
     * 
     * @param  string $message  The actual flash message.  
     * @param  string $title    The title for the flash message default to "Danger!"
     * @return FlashNotifier
     */
    public function flashDanger(string $message, string $title = 'Danger!'): FlashNotifier
    {
        return $this->flashMessage("<strong>{$title}</strong>", $message)->error();
    }
}