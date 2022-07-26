<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class MedicamentRecipe extends Pivot
{
    use HasFactory;
    use Loggable;

    protected $table = "medicament_recipe";
    protected $fillable = ['medicament_id','recipe_id', 'recipe_type','prescribed_amount','quantity','price','description'];

    /**
     * This are the relations
     */
    public function medicament()
    {
        return $this->belongsTo(Medicament::class);
    }
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

}
