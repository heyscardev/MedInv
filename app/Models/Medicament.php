<?php

namespace App\Models;

use Hamcrest\Arrays\IsArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    //accessors y mutators

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
    //calculated accessors y mutators
    public function getQuantityGlobalAttribute()
    {
        return $this->modules->sum('pivot.quantity_exist');
    }
    //relations ships
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
    public function transfers()
    {
        return $this->belongsToMany(Transfer::class, 'transfer_medicament')->withPivot('quantity');
    }

    //query scopes


    public function scopeUnit($query, $column, $value)
    {
        if (is_array($value)) return $query->whereRelation('unit', $column, ">=",   $value[0])->whereRelation('unit', $column, "<=",   $value[1]);
        return $query->whereRelation('unit', $column, "LIKE", "%" . strtoupper($value) . "%");
    }
    public function scopeLikeOrBeetween($query, $column, $value)
    {
        if (is_array($value)) return $query->where($column, ">=",$value[0] ? $value[0] : 0)->where($column, "<=", $value[1] ? $value[1] : 999999999.99);
        return $query->where($column, "LIKE", "%" . strtoupper($value) . "%");
    }
    public function scopeOrderByUnit($query, $column, $sorting)
    {
        return $query->join('units', 'medicaments.unit_id', '=', 'units.id')
            ->orderBy("units." . $column, $sorting);
    }
    public function scopeOrderByGlobalInventory($query,$sorting)
    {
        $query->withSum('modules',"medicament_module.quantity_exist")->orderBy('modules_sum_medicament_modulequantity_exist',$sorting);
    }
}
