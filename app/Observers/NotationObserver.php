<?php 

namespace ActivismeBe\Observers; 

use ActivismeBe\Models\Notation;

/**
 * Class NotationObserver 
 * 
 * @package ActivismeBe\Observers 
 */
class NotationObserver extends ObserverBase
{
    /**
     * Handle the notation "created" event. 
     * 
     * @param  Notation $notation The entity from the created notation. 
     * @return void
     */
    public function created(Notation $notation): void 
    {
        $user = $this->auth->user();
        $notation->author()->associate($user)->save();
    }
}