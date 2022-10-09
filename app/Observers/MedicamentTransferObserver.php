<?php

namespace App\Observers;

use App\Models\MedicamentTransfer;

class MedicamentTransferObserver
{
    /**
     * Handle the MedicamentTransfer "created" event.
     *
     * @param  \App\Models\MedicamentTransfer  $medicamentTransfer
     * @return void
     */
    public function created(MedicamentTransfer $medicamentTransfer)
    {
        $moduleSend =$medicamentTransfer->transfer->moduleSend;
        $moduleReceive =$medicamentTransfer->transfer->moduleReceive;
        $medicament = $medicamentTransfer->medicament;
        $moduleSend->removeMedicament($medicament->id,$medicamentTransfer->quantity);
        $moduleReceive->addMedicament($medicament->id,$medicamentTransfer->quantity);
    }

    /**
     * Handle the MedicamentTransfer "updated" event.
     *
     * @param  \App\Models\MedicamentTransfer  $medicamentTransfer
     * @return void
     */
    public function updated(MedicamentTransfer $medicamentTransfer)
    {
        //
    }

    /**
     * Handle the MedicamentTransfer "deleted" event.
     *
     * @param  \App\Models\MedicamentTransfer  $medicamentTransfer
     * @return void
     */
    public function deleted(MedicamentTransfer $medicamentTransfer)
    {
        //
    }

    /**
     * Handle the MedicamentTransfer "restored" event.
     *
     * @param  \App\Models\MedicamentTransfer  $medicamentTransfer
     * @return void
     */
    public function restored(MedicamentTransfer $medicamentTransfer)
    {
        //
    }

    /**
     * Handle the MedicamentTransfer "force deleted" event.
     *
     * @param  \App\Models\MedicamentTransfer  $medicamentTransfer
     * @return void
     */
    public function forceDeleted(MedicamentTransfer $medicamentTransfer)
    {
        //
    }
}
