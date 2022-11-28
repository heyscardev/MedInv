<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nationality',
        'c_i',
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'email',
        'password',
        'phone',
        'direction',
        'state'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * This are the relations
     */
    public function Transfers()
    {
        return $this->hasMany(Transfer::class);
    }
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
    public function recipes()
    {
        return $this->HasMany(Recipe::class);
    }
    public function buys(){
        return $this->hasMany(Buy::class);
    }
}
