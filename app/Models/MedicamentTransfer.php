<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MedicamentTransfer extends Pivot
{
    use HasFactory;
    protected $table = "medicament_transfer";
    protected $fillable = ['medicament_id', 'transfer_id','quantity'];

    public function medicament(){
        return $this->belongsTo(Medicament::class);
    }
    public function transfer(){
        return $this->belongsTo(Transfer::class);
    }
}
