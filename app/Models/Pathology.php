<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Pathology extends Model
{
    use HasFactory;
    use Loggable;

    protected $fillable = ['code','name'];

    /**
     * This are the relations
     */
    public function recipes(){
        return $this->hasMany(Recipe::class);
    }

}
