<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'price_sale',
        'quantity_exist',
        'unit_id'
    ];
    protected $appends = ['quantity_global'];

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }
    public function getCodeAttribute($value)
    {
        return strtoupper($value);
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function getQuantityGlobalAttribute()
    {
        return $this->modules->sum('pivot.quantity_exist');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function modules()
    {
        return $this->belongsToMany(Module::class)->withPivot('quantity_exist')->withTimestamps()->wherePivot('quantity_exist', '>', 0);
    }
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_medicament')->withPivot('prescribed_amount', 'quantity_deliver', 'price', 'description');
    }

    public function buys()
    {
        return $this->belongsToMany(Buy::class)->withPivot('price', 'quantity')->withTimestamps()->using(BuyMedicament::class);;
    }
    public function transfers(){
        return $this->belongsToMany(Transfer::class,'transfer_medicament')->withPivot('quantity');
    }
}
