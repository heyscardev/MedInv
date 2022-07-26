<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class Medicament extends Model
{
    use HasFactory;
    use Loggable;

    protected $fillable = [
        'code',
        'name',
        'medicament_group_id',
        'unit_id',
        'price_sale',
        'quantity_exist'
    ];

    protected $appends = ['quantity_global'];

    protected $with = ['group','unit'];


    /**
     * This are the relations
     */
    public function group()
    {
        return $this->belongsTo(MedicamentGroup::class, 'medicament_group_id','id');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function modules()
    {
        return $this->belongsToMany(Module::class)->withPivot('quantity_exist')->withTimestamps()->wherePivot('quantity_exist', '>', 0)->withTrashed();;
    }
/*     public function recipes()
    {
        return $this->belongsToMany(Recipe::class)->withPivot('prescribed_amount', 'quantity', 'price', 'description')->using(MedicamentRecipe::class);
    } */

    public function buys()
    {
        return $this->belongsToMany(Buy::class)->withPivot('price', 'quantity')->withTimestamps()->using(BuyMedicament::class);;
    }
    public function transfers()
    {
        return $this->belongsToMany(Transfer::class)->withPivot('quantity')->using(MedicamentTransfer::class);
    }

    /**
     * This are the Attribute
     */
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

    /**
     * This are the Scope
     */
    public function scopeUnit($query, $column, $value)
    {
        return $query->whereRelation('unit', $column, "LIKE", "%" . strtoupper($value) . "%");
    }
    public function scopeLikeOrBeetween($query, $column, $value)
    {
        if (is_array($value))
            return $query->where($column, ">=",$value[0] ? $value[0] : 0)->where($column, "<=", $value[1] ? $value[1] : 999999999.99);
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
