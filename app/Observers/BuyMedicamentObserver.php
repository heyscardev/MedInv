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
        $buyMedicament->buy->module->addMedicament($buyMedicament->medicament->id, $buyMedicament->quantity);
    }

    /**
     * Handle the BuyMedicament "updated" event.
     *
     * @param  \App\Models\BuyMedicament  $buyMedicament
     * @return void
     */
    public function updated(BuyMedicament $buyMedicament)
    {
        $quantity = $buyMedicament->getAttribute('quantity') - $buyMedicament->getOriginal('quantity') ;
        $buyMedicament->buy->module->addMedicament($buyMedicament->medicament->id, $quantity);
    }

    /**
     * Handle the BuyMedicament "deleted" event.
     *
     * @param  \App\Models\BuyMedicament  $buyMedicament
     * @return void
     */
    public function deleting(BuyMedicament $buyMedicament)
    {
        $medTra = BuyMedicament::where('medicament_id', $buyMedicament->medicament_id)->where('buy_id', $buyMedicament->buy_id)->first();
       return $buyMedicament->buy->module->removeMedicament($buyMedicament->medicament->id, $medTra->quantity);
    }

}
