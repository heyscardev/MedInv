<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class MedicamentTransfer extends Pivot
{
    use HasFactory;
    use Loggable;

    protected $table = "medicament_transfer";
    protected $fillable = ['medicament_id', 'transfer_id','quantity'];

    /**
     * This are the relations
     */
    public function medicament(){
        return $this->belongsTo(Medicament::class);
    }
    public function transfer(){
        return $this->belongsTo(Transfer::class);
    }

}
