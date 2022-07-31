<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'price_sale',
        'quantity_exist',
        'unit_id'
    ];
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function modules(){
        return $this->belongsToMany(Module::class)->withPivot('quantity_exist')->withTimestamps()->wherePivot('quantity_exist','>',0);
    }
    public function recipes(){
        return $this->belongsToMany(Recipe::class,'recipe_medicament_unit')->withPivot('unit_id','prescribed_amount','quantity_deliver','price','description');
    }
    public function units(){
        return $this->belongsToMany(Unit::class,'recipe_medicament_unit')->withPivot('recipe_id','prescribed_amount','quantity_deliver','price','description');
    }
    
}
