<?php

namespace App\Models;

use Hamcrest\Description;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_type',
        'state',
        'patient_id',
        'doctor_id',
        'pathology_id',
        'module_id',
        'user_id',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function pathology()
    {
        return $this->belongsTo(Pathology::class);
    }
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function medicaments(){
        return $this->belongsToMany(Medicament::class)->withPivot('prescribed_amount','quantity','price','description')->using(MedicamentRecipe::class);
    }
}
