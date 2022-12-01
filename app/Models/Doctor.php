<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'nationality',
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

    protected $dates = ['deleted_at'];

    /**
     * This are the relations
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class)->withTrashed();
    }

}
