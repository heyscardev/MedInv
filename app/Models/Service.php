<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;
    protected $printable = ['name'];

    public function recipes(){
        return $this->belongsToMany(Recipe::class);
    }
}
