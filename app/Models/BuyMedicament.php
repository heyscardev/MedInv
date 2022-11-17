<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\Pivot;

class BuyMedicament extends Pivot
{
    protected $table = "buy_medicament";
    protected $fillable = ['quantity','price'];

    /**
     * This are the relations
     */
    public function medicament(){
        return $this->belongsTo(Medicament::class);
    }
    public function buy(){
        return $this->belongsTo(Buy::class);
    }

}
