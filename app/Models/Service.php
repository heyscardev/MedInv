<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * This are the relations
     */
    public function doctors(){
        return $this->hasMany(Doctor::class);
    }

}
