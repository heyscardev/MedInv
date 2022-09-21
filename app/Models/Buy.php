<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    use HasFactory;
    protected $fillable = ['module_id','user_id','description'];

    public function module(){
        return $this->belongsTo(Module::class);
    }
    public function medicaments(){
        return $this->belongsToMany(Medicament::class)->withPivot('price','quantity')->withTimestamps()->using(BuyMedicament::class);;
    }
}
