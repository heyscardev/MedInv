<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_history',
        'c_i',
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'child',
        'email',
        'phone',
        'direction'
    ];

    /**
     * This are the relations
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

}
