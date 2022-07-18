<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name'
    ];
    public function medicaments(){
        return$this->belongsToMany(Medicament::class)->as('modules')->withPivot('quantity_exist')->withTimestamps()->wherePivot('quantity_exist','>',0);
    }
    public function manager(){
        return $this->hasMany(Medicaments::class);
    }
}
