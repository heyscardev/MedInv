<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleBuyRequest;
use App\Models\Buy;
use App\Models\Medicament;
use App\Models\Module;
use App\Models\Unit;
use Illuminate\Http\Request;

class ModuleBuyController extends Controller
{
    public function create(ModuleBuyRequest $request,Module $module)
    {
        $Medicaments = Medicament::get(['id', 'code', 'name']);
        $units = Unit::orderBy('name')->get();
        return inertia('Modules/buy.employee', ['module' => $module, 'medicaments' => $Medicaments, 'units' => $units]);
    }
    public function index(ModuleBuyRequest $request, Module $module)
    {
        $buys = $module->buys;
        return inertia('Modules/buy.index.employee', ['data' => $buys, 'module'=>$module]);
    }
    public function store(ModuleBuyRequest $request, Module $module)
    {
        $data = $request->validated();
        $buy = new Buy(['module_id' => $module->id,'user_id'=>auth()->user()->id, 'description' => isset($data['description']) ? $data['description'] : null]);
        $buy->save();
        array_map(function ($value) use ( $buy,$module) {
            $buy->medicaments()->attach($value['id'], ['quantity' => $value['quantity'], 'price' => $value['price']]);
        }, $data['medicaments']);
       return redirect(route('module.show',$module->id));
    }
}
