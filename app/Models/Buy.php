<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Buy extends Model
{
    use HasFactory;
    use Loggable;

    protected $fillable = ['module_id','user_id','description'];

    protected $appends = ['total_quantity','total_medicaments','total_price'];

    protected $with = ['module','user'];


    /**
     * This are the relations
     */
    public function module(){
        return $this->belongsTo(Module::class)->withTrashed();;
    }
    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function medicaments(){
        return $this->belongsToMany(Medicament::class)->withPivot('price','quantity')->withTimestamps()->using(BuyMedicament::class);
    }


    /**
     * This are the Attribute
     */
    protected function totalMedicaments():Attribute{
        return new Attribute(get:fn()=>$this->medicaments->count());
    }
    protected function totalQuantity():Attribute{
        return new Attribute(get:fn()=>$this->medicaments->sum('pivot.quantity'));
    }
    protected function totalPrice():Attribute{
        return new Attribute(get:fn()=>$this->medicaments->sum('pivot.total_price'));
    }

}
