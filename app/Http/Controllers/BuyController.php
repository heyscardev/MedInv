<?php

namespace App\Http\Controllers;

use App\Http\Requests\Buy\CreateBuyRequest;
use App\Models\Buy;
use App\Models\Medicament;
use App\Models\Module;
use App\Models\Unit;
use Illuminate\Http\Request;
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
        $units = Unit::all();
        return Inertia::render('Modules/buy.employee', ['module' => $item, 'medicaments' => $Medicaments,'units'=>$units]);
    }

    public function store(CreateBuyRequest $request, $id)
    {
        $data = $request->validated();
        $module = Module::find($id);
        $buy = new Buy(['module_id' => $id, 'description' => isset($data['description']) ? $data['description'] : null]);
        $buy->save();
        array_map(function ($value) use ( $buy,$module) {
            $buy->medicaments()->attach($value['id'], ['quantity' => $value['quantity'], 'price' => $value['price']]);
            //$module->addMedicament($value['id'],$value['quantity']);
        }, $data['medicaments']);
dd($module->medicaments);
        return $buy->medicaments;
    }
}
