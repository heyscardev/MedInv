<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'n_history',
        'nationality',
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

    protected $dates = ['deleted_at'];

    /**
     * This are the relations
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    /**
     * This are the Attribute
     */
    public function getFullNameAttribute()
    {
        return $this->first_name .' '.$this->last_name;
    }

}
