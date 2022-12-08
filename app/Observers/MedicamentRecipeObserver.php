<?php

namespace App\Observers;

use App\Models\MedicamentRecipe;

class MedicamentRecipeObserver
{
    /**
     * Handle the MedicamentRecipe "created" event.
     *
     * @param  \App\Models\MedicamentRecipe  $medicamentRecipe
     * @return void
     */
    public function created(MedicamentRecipe $medicamentRecipe)
    {
        $recipe  = $medicamentRecipe->recipe;

       
            $recipe->module->removeMedicament($medicamentRecipe->medicament_id, $medicamentRecipe->quantity);

    }

    /**
     * Handle the MedicamentRecipe "updated" event.
     *
     * @param  \App\Models\MedicamentRecipe  $medicamentRecipe
     * @return void
     */
    public function updated(MedicamentRecipe $medicamentRecipe)
    {
        $recipe  = $medicamentRecipe->recipe;
$quantity = $medicamentRecipe->getAttribute('quantity') -  $medicamentRecipe->getOriginal('quantity');
        if ($recipe->state !== "DELIVER") {
            $recipe->module->addMedicaments($medicamentRecipe->medicament_id, $medicamentRecipe->quantity);
        }
    }

    /**
     * Handle the MedicamentRecipe "deleted" event.
     *
     * @param  \App\Models\MedicamentRecipe  $medicamentRecipe
     * @return void
     */
    public function deleting(MedicamentRecipe $medicamentRecipe)
    {
        $medTra = MedicamentRecipe::where('medicament_id', $medicamentRecipe->medicament_id)->where('recipe_id', $medicamentRecipe->recipe_id)->first();
       
       return $medicamentRecipe->recipe->module->addMedicament($medTra->medicament_id, $medTra->quantity);
    }

}
