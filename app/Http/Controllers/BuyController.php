<?php

namespace App\Http\Controllers;

use App\Http\Requests\Buy\CreateBuyRequest;
use App\Models\Buy;
use App\Models\Medicament;
use App\Models\Module;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class BuyController extends Controller
{
    public function create($id)
    {
        $item = Module::find($id);
        $medmodule = $item->medicaments()->where('medicament_id',4)->first();
        if (!isset($item)) return abort('404');
        if ($item->user->id !== auth()->user()->id) return abort('403');
        $Medicaments = Medicament::get(['id', 'code', 'name']);
        $units = Unit::orderBy('name')->get();
        return Inertia::render('Modules/buy.employee', ['module' => $item, 'medicaments' => $Medicaments,'units'=>$units]);
    }
    public function index(Request $request){
        $valid = $request->validate([
            'filters'=>'array|min:1',
            'filter.medicament'=>'numeric|min:1',
            'filter.module'=>'numeric|min:1',
            'filter.unit'=>'numeric|min:1'
        ]);
        $data = auth()->user()->buys;
        return inertia('Buys/index.employee',['data'=>$data]);
        
        if(isset($valid['filters'])){

        };

    }
    public function store(CreateBuyRequest $request, $id)
    {
        $data = $request->validated();
        $module = Module::find($id);
        $buy = new Buy(['module_id' => $id,'user_id'=>auth()->user()->id, 'description' => isset($data['description']) ? $data['description'] : null]);
        $buy->save();
        array_map(function ($value) use ( $buy,$module) {
            $buy->medicaments()->attach($value['id'], ['quantity' => $value['quantity'], 'price' => $value['price']]);
            //$module->addMedicament($value['id'],$value['quantity']);
        }, $data['medicaments']);
       return redirect(route('module.show',$id));
    }
}
