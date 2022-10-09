<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'user_id'
    ];

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
    public function transfersAll()
    {
        return $this->hasMany(Transfer::class, 'module_receive_id')->orWhere('module_send_id', '=', $this->id);
    }
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
            return $this->medicaments()->attach($medicamentId, ['quantity_exist' => 0]);
        if ($oldMedicament->pivot->quantity_exist >= $decrement)
            return $oldMedicament->pivot->decrement('quantity_exist', $decrement);
        else $oldMedicament->pivot->quantity_exist;
    }
}
