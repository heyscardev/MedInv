<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Module extends Model
{
    use HasFactory, SoftDeletes;
    use Loggable;

    protected $fillable = [
        'code',
        'name',
        'user_id'
    ];

    //protected $dates = ['deleted_at'];

    /**
     * This are the relations
     */
    public function medicaments()
    {
        return $this->belongsToMany(Medicament::class)->with(['unit:id,name'])->withPivot('quantity_exist')->withTimestamps();
        //return$this->belongsToMany(Medicament::class)->withPivot('quantity_exist')->withTimestamps()->wherePivot('quantity_exist','>',0);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
    public function buys()
    {
        return $this->hasMany(Buy::class);
    }
    public function transferReceives()
    {
        return $this->hasMany(Transfer::class, 'module_receive_id');
    }
    public function transferSends()
    {
        return $this->hasMany(Transfer::class, 'module_send_id');
    }
    public function transfers()
    {
        return $this->hasMany(Transfer::class, 'module_receive_id')->orWhere('module_send_id', '=', $this->id);
    }

     /**
     * This are the Attribute
     */
    public function getTotalMedicamentsAttribute()
    {
        return $this->medicaments->sum('pivot.quantity_exist');
    }


    //////////////////

    public function addMedicament($medicamentId, $increment = 0)
    {
        $oldMedicament = $this->medicaments()
            ->where('medicament_id', $medicamentId)->first();

        if (!isset($oldMedicament))
            return $this->medicaments()->attach($medicamentId, ['quantity_exist' => $increment]);

        return $oldMedicament->pivot->increment('quantity_exist', $increment);
    }
    public function removeMedicament($medicamentId, $decrement = 0)
    {
        $oldMedicament = $this->medicaments()
            ->where('medicament_id', $medicamentId)->first();

        if (!isset($oldMedicament))
            return $this->medicaments()->attach($medicamentId, ['quantity_exist' => $decrement * -1]);

            return $oldMedicament->pivot->decrement('quantity_exist', $decrement);
    }

}
