<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'c_i',
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'email',
        'phone',
        'direction',
        'service_id'
    ];

    /**
     * This are the relations
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
