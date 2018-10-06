<?php 

namespace ActivismeBe\Composers;

use Illuminate\View\View;
 

/**
 * Class CityMonitorComposer
 * 
 * @package ActivismeBe\Composers
 */
class CityMonitorComposer 
{
    /**
     * Method for binding to the view. 
     * 
     * @param  View $view The builder instance for the blade view.
     * @return void
     */
    public function compose(View $view): void 
    {
        $view->with('accepted', 0); 
        $view->with('rejected', 0);
        $view->with('pending', 0);
    }

    private function totalCount(): int 
    {

    }

    private function acceptedCount(): int 
    {

    }

    private function rejectedCount(): int 
    {

    }

    private function pendingCount(): int
    {

    }
}