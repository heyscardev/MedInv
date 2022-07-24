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
        return $this->belongsToMany(Module::class)->as('modules')->withPivot('quantity_exist')->withTimestamps()->wherePivot('quantity_exist','>',0);
    }
    
}
