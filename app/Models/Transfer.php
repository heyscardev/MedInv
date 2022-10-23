<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'module_receive_id', 'module_send_id', 'description'];
    protected $appends = ['total_quantity_medicaments','quantity_medicaments'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function moduleReceive()
    {
        return $this->belongsTo(Module::class, 'module_receive_id');
    }
    public function moduleSend()
    {
        return $this->belongsTo(Module::class, 'module_send_id');
    }
    public function medicaments()
    {
        return $this->belongsToMany(Medicament::class)->withPivot('quantity')->using(MedicamentTransfer::class);
    }

    public function getTotalQuantityMedicamentsAttribute()
    {
        return $this->medicaments->sum('pivot.quantity');
    }
    public function getQuantityMedicamentsAttribute()
    {
        return $this->medicaments->count();
    }
    public function scopeWhereModuleReceive($query, $column, $value)
    {
        if (is_array($value)) return $query->whereRelation('moduleReceive', $column, ">=",   $value[0])->whereRelation('moduleReceive', $column, "<=",   $value[1]);
        return $query->whereRelation('moduleReceive', $column, "LIKE", "%" . $value . "%");
    }
    public function scopeWhereModuleSend($query, $column, $value)
    {
        if (is_array($value)) return $query->whereRelation('moduleSend', $column, ">=",   $value[0])->whereRelation('moduleSend', $column, "<=",   $value[1]);
        return $query->whereRelation('moduleSend', $column, "LIKE", "%" . $value . "%");
    }
    public function scopeWhereUser($query, $column, $value)
    {
        if (is_array($value)) return $query->whereRelation('user', $column, ">=",   $value[0])->whereRelation('unit', $column, "<=",   $value[1]);
        return $query->whereRelation('user', $column, "LIKE", "%" . $value . "%");
    }
    public function scopeLikeOrBeetween($query, $column, $value)
    {
        if (is_array($value)) return $query
            ->when(isset($value[0]), function ($q) use ($column, $value) {
                $q->where($column, ">=", $value[0]);
            })
            ->when(isset($value[1]), function ($q) use ($column, $value) {
                $q->where($column, "<=", $value[1]);
            });
        return $query->where($column, "LIKE", "%" . strtoupper($value) . "%");
    }
    public function scopeOrderByUser($query, $column, $sorting)
    {
        return $query->join('users', 'transfers.user_id', '=', 'users.id')
            ->orderBy("users." . $column, $sorting)->select('transfers.*');
    }
    public function scopeOrderByModuleReceive($query, $column, $sorting)
    {
        return $query->join('modules as moduleReceive', 'transfers.module_receive_id', '=', 'moduleReceive.id')
            ->orderBy("moduleReceive." . $column, $sorting)->select('transfers.*');
    }
    public function scopeOrderByModuleSend($query, $column, $sorting)
    {
        return $query->join('modules as moduleSend', 'module_send_id', '=', 'moduleSend.id')
            ->orderBy("moduleSend." . $column, $sorting)->select('transfers.*');
    }
}
