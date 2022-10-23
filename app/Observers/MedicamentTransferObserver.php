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
        $moduleSend = $medicamentTransfer->transfer->moduleSend;
        $moduleReceive = $medicamentTransfer->transfer->moduleReceive;
        $medicament = $medicamentTransfer->medicament;
        $moduleSend->removeMedicament($medicament->id, $medicamentTransfer->quantity);
        $moduleReceive->addMedicament($medicament->id, $medicamentTransfer->quantity);
    }

    /**
     * Handle the MedicamentTransfer "updated" event.
     *
     * @param  \App\Models\MedicamentTransfer  $medicamentTransfer
     * @return void
     */
    public function updated(MedicamentTransfer $medicamentTransfer)
    {
        if ($medicamentTransfer->isDirty('quantity')) {
            $quantity = $medicamentTransfer->getOriginal('quantity') - $medicamentTransfer->getAttribute('quantity');
            $moduleSend = $medicamentTransfer->transfer->moduleSend;
            $moduleReceive = $medicamentTransfer->transfer->moduleReceive;
            $moduleSend->addMedicament($medicamentTransfer->medicament_id, $quantity);
            $moduleReceive->removeMedicament($medicamentTransfer->medicament_id, $quantity);
        }
    }

    /**
     * Handle the MedicamentTransfer "deleted" event.
     *
     * @param  \App\Models\MedicamentTransfer  $medicamentTransfer
     * @return void
     */
    public function deleting(MedicamentTransfer $medicamentTransfer)
    {

        $medTra = MedicamentTransfer::where('medicament_id', $medicamentTransfer->medicament_id)->where('transfer_id', $medicamentTransfer->transfer_id)->first();
        $moduleSend = $medicamentTransfer->transfer->moduleSend;
        $moduleReceive = $medicamentTransfer->transfer->moduleReceive;
        $medicament = $medicamentTransfer->medicament;
        $moduleSend->addMedicament($medicament->id, $medTra->quantity);
        $moduleReceive->removeMedicament($medicament->id, $medTra->quantity);
    }
}
