<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Unit extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Loggable;

    protected $fillable = ['name'];

    /**
     * This are the relations
     */
    public function medicaments(){
        return $this->hasMany(Medicaments::class);
    }
    public function recipes(){
        return $this->belongsToMany(Recipe::class,'recipe_medicament_unit')->withPivot('medicament_id','prescribed_amount','quantity_deliver','price','description');
    }

}
