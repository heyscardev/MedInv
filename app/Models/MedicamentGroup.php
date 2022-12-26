<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicamentGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name','restricted','description'];

 public function medicaments(){
       return $this->hasMany(Medicament::class);
    }
    public function doctors(){
        return $this->belongsToMany(Doctor::class,"doctor_medicament_groups");
     }
}
