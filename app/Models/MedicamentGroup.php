<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicamentGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name','description'];

    // public function medicaments(){
    //     return $this->hasMany(medicaments::class);
    // }
}
