<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];
    public function medicaments(){
        return $this->hasMany(Medicaments::class);
    }
    public function recipes(){
        return $this->belongsToMany(Recipe::class,'recipe_medicament_unit')->withPivot('medicament_id','prescribed_amount','quantity_deliver','price','description');
    }
    public function medicaments_recipes(){
        return $this->belongsToMany(Medicament::class,'recipe_medicament_unit')->withPivot('recipe_id','prescribed_amount','quantity_deliver','price','description');
    }
}
