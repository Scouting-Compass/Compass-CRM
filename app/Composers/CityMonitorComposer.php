<?php 

namespace ActivismeBe\Composers;

use Illuminate\View\View;
use ActivismeBe\Models\City;
 
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
        $total = $this->formatTotal(City::currentStatus('accepted')->count());
        return str_replace(',', '.', $total);
    }

    /**
     * Counter function for the cities that rejected the charter. 
     * 
     * @return string
     */
    private function rejectedCount(): string
    {
        $total = $this->formatTotal(City::currentStatus('rejected')->count());
        return str_replace(',', '.', $total);
    }

    /**
     * Counter function for the cities that are pending about the charter. 
     * 
     * @return string
     */
    private function pendingCount(): string
    {
        $total = $this->formatTotal(City::currentStatus('pending')->count());
        return str_replace(',', '.', $total);
    }

    /**
     * Function for formatting the output number. 
     * 
     * @param  int $total the total amount of cities with the given status. 
     * @return string
     */
    private function formatTotal(int $total = 0): string 
    {
        return number_format($total);
    }
}