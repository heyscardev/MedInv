<?php

namespace App\Observers;

use App\Models\BuyMedicament;

class BuyMedicamentObserver
{
    public $afterCommit = true;
    /**
     * Handle the BuyMedicament "created" event.
     *
     * @param  \App\Models\BuyMedicament  $buyMedicament
     * @return void
     */
    public function created(BuyMedicament $buyMedicament)
    {
        $buyMedicament->buy->module->addMedicament($buyMedicament->medicament->id,$buyMedicament->quantity);  
    }

    /**
     * Handle the BuyMedicament "updated" event.
     *
     * @param  \App\Models\BuyMedicament  $buyMedicament
     * @return void
     */
    public function updated(BuyMedicament $buyMedicament)
    {
        //
    }

    /**
     * Handle the BuyMedicament "deleted" event.
     *
     * @param  \App\Models\BuyMedicament  $buyMedicament
     * @return void
     */
    public function deleted(BuyMedicament $buyMedicament)
    {
        //
    }

    /**
     * Handle the BuyMedicament "restored" event.
     *
     * @param  \App\Models\BuyMedicament  $buyMedicament
     * @return void
     */
    public function restored(BuyMedicament $buyMedicament)
    {
        //
    }

    /**
     * Handle the BuyMedicament "force deleted" event.
     *
     * @param  \App\Models\BuyMedicament  $buyMedicament
     * @return void
     */
    public function forceDeleted(BuyMedicament $buyMedicament)
    {
        //
    }
}
