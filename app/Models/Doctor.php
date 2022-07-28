<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    
    protected $printable = [
        'code',
        'c_i',
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
        return $this->hasMany(Recipe::class);
    }
}
