<?php

namespace App\Observers;

use App\Models\Module;
use App\Models\Recipe;

class RecipeObserver
{
    //

        /**
         * Handle the Buy "created" event.
         *
         * @param  \App\Models\Buy  $buy
         * @return void
         */
        public function created(Recipe $recipe)
        {
            //
        }
    
        /**
         * Handle the Buy "updated" event.
         *
         * @param  \App\Models\Buy  $buy
         * @return void
         */
        public function updated(Recipe $recipe)
        {
            if ($recipe->isDirty('module_id')) {
                $moduleOriginal = Module::find($recipe->getOriginal('module_id'));
                $moduleNew = Module::find($recipe->getAttribute('module_id'));
                $recipe->medicaments()->each(function($med) use ($moduleOriginal,$moduleNew){
    
                    $moduleOriginal->removeMedicament($med->id,$med->pivot->quantity);
                    $moduleNew->addMedicament($med->id,$med->pivot->quantity);
                });
            }
        }
    
        /**
         * Handle the Buy "deleted" event.
         *
         * @param  \App\Models\Recipe  $recipe
         * @return void
         */
        public function deleting(Recipe $recipe)
        {
           
            $recipe->medicaments()->each(function ($medicament) use ($recipe) {
                $recipe->medicaments()->detach($medicament->id);
            });
        }
    
    

}    
