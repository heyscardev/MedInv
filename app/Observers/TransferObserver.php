<?php

namespace App\Observers;

use App\Models\Module;
use App\Models\Transfer;

class TransferObserver
{


    /**
     * Handle the Transfer "updated" event.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return void
     */
    public function updated(Transfer $transfer)
    {

        if ($transfer->isDirty('module_send_id')) {
            $moduleSendOriginal = Module::find($transfer->getOriginal('module_send_id'));
            $moduleSendNew = Module::find($transfer->getAttribute('module_send_id'));
            $transfer->medicaments()->each(function($med) use ($moduleSendNew,$moduleSendOriginal){

                $moduleSendOriginal->addMedicament($med->id,$med->pivot->quantity);
                $moduleSendNew->removeMedicament($med->id,$med->pivot->quantity);
            });
        }
        if ($transfer->isDirty('module_receive_id')) {
            $moduleReceiveOriginal = Module::find($transfer->getOriginal('module_receive_id'));
            $moduleReceiveNew = Module::find($transfer->getAttribute('module_receive_id'));
            $transfer->medicaments()->each(function($med) use ($moduleReceiveOriginal,$moduleReceiveNew){

                $moduleReceiveOriginal->removeMedicament($med->id,$med->pivot->quantity);
                $moduleReceiveNew->addMedicament($med->id,$med->pivot->quantity);
            });
        }
    }

    /**
     * Handle the Transfer "deleted" event.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return void
     */

    public function deleting(Transfer $transfer)
    {
        $transfer->medicaments()->each(function ($medicament) use ($transfer) {
            $transfer->medicaments()->detach($medicament->id);
        });
    }
}
