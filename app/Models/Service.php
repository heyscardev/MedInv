<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Service extends Model
{
    use HasFactory;
    use Loggable;

    protected $fillable = ['name'];

    /**
     * This are the relations
     */
    public function doctors(){
        return $this->hasMany(Doctor::class);
    }

}
