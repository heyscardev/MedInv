<?php

namespace App\Observers;

use App\Models\Buy;

class BuyObserver
{
    /**
     * Handle the Buy "created" event.
     *
     * @param  \App\Models\Buy  $buy
     * @return void
     */
    public function created(Buy $buy)
    {
        
    }

    /**
     * Handle the Buy "updated" event.
     *
     * @param  \App\Models\Buy  $buy
     * @return void
     */
    public function updated(Buy $buy)
    {
        //
    }

    /**
     * Handle the Buy "deleted" event.
     *
     * @param  \App\Models\Buy  $buy
     * @return void
     */
    public function deleted(Buy $buy)
    {
        //
    }

    /**
     * Handle the Buy "restored" event.
     *
     * @param  \App\Models\Buy  $buy
     * @return void
     */
    public function restored(Buy $buy)
    {
        //
    }

    /**
     * Handle the Buy "force deleted" event.
     *
     * @param  \App\Models\Buy  $buy
     * @return void
     */
    public function forceDeleted(Buy $buy)
    {
        //
    }
}
