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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ModuleBuyRequest $request, Module $module)
    {
        $buys = $module->buys;
        return inertia('Modules/buy.index.employee', ['data' => $buys, 'module'=>$module]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ModuleBuyRequest $request,Module $module)
    {

        $search=$request->get('search',null);
        $Medicaments =$search? Medicament::whereRelation('unit','name','LIKE',"%$search%")->orWhere('name','LIKE','%'.$search.'%')->orWhere('code','LIKE','%'.$search.'%')->orderBy('name')->with('unit')->distinct('medicaments.id')->get():[];
        $units = Unit::orderBy('name')->get();
        return inertia('Modules/buy.employee', ['module' => $module, 'medicaments' => $Medicaments, 'units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
