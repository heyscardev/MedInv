<?php

namespace App\Observers;

use App\Models\Buy;
use App\Models\Module;

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
        //
    }

    /**
     * Handle the Buy "updated" event.
     *
     * @param  \App\Models\Buy  $buy
     * @return void
     */
    public function updated(Buy $buy)
    {
        if ($buy->isDirty('module_id')) {
            $moduleOriginal = Module::find($buy->getOriginal('module_id'));
            $moduleNew = Module::find($buy->getAttribute('module_id'));
            $buy->medicaments()->each(function($med) use ($moduleOriginal,$moduleNew){

                $moduleOriginal->removeMedicament($med->id,$med->pivot->quantity);
                $moduleNew->addMedicament($med->id,$med->pivot->quantity);
            });
        }
    }

    /**
     * Handle the Buy "deleted" event.
     *
     * @param  \App\Models\Buy  $buy
     * @return void
     */
    public function deleting(Buy $buy)
    {
        $buy->medicaments()->each(function ($medicament) use ($buy) {
            $buy->medicaments()->detach($medicament->id);
        });
    }


}
