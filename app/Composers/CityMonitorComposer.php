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
        $view->with('accepted', $this->acceptedCount()); 
        $view->with('rejected', $this->rejectedCount());
        $view->with('pending',  $this->pendingCount());
    }

    /**
     * Counter function for the cities that accepted the charter. 
     * 
     * @return string
     */
    private function acceptedCount(): string
    {
        $total = $this->formatTotal(1333);
        return str_replace(',', '.', $total);
    }

    /**
     * Counter function for the cities that rejected the charter. 
     * 
     * @return string
     */
    private function rejectedCount(): string
    {

    }

    /**
     * Counter function for the cities that are pending about the charter. 
     * 
     * @return string
     */
    private function pendingCount(): string
    {

    }

    /**
     * Function for formatting the output number. 
     * 
     * @return string
     */
    private function formatTotal(int $total): string 
    {
        return number_format($total);
    }
}