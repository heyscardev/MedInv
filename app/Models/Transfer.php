<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transfer extends Model
{
    use HasFactory;
    protected $printable = ['user_id','module_receive_id','module_send_id','description'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function moduleReceive(){
        return $this->belongsTo(Module::class,'module_receive_id');
    }
    public function moduleSend(){
        return $this->belongsTo(Module::class,'module_send_id');
    }
    public function medicaments(){
        return $this->belongsToMany(Medicament::class,'transfer_medicament')->withPivot('quantity');
    }
}
