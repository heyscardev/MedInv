<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    
    protected $printable = [
        'n_history',
        'identification',
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'email',
        'phone',
        'direction'
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }
}
