<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'user_id'
    ];
    //this are the relations
    public function medicaments(){
        return$this->belongsToMany(Medicament::class)->withPivot('quantity_exist')->withTimestamps()->wherePivot('quantity_exist','>',0);
    }
    public function manager(){
        return $this->belongsTo(Medicaments::class);
    }
    public function recipes(){
        return $this->hasMany(Recipe::class);
    }
}
