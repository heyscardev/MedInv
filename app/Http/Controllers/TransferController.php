<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferRequest;
use App\Models\Module;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TransferController extends Controller
{
    public function create(TransferRequest $request, Module $module)
    {
        $moduleSelected = null;
        $medicaments = [];
        $selectedMedicaments =[];
        if ($module->exists) {

            $moduleSelected = $module;
            $medicaments = $module->medicaments()->wherePivot('quantity_exist', ">", 0)->get();
            $selectedMedicaments =  $module->medicaments()->wherePivot('quantity_exist',">",0)->findMany($request->get('selected_medicaments'));
        }
        $moduleFromTransfers = User::find(auth()->user()->id)->modules()->with('user')->get();
        $moduleToTransfers = Module::with('user')->get();
        return inertia('Transfers/Create', compact('moduleToTransfers', 'moduleFromTransfers', 'moduleSelected','selectedMedicaments', 'medicaments'));
    }
    public function store(TransferRequest $request)
    {
        $transfer = new Transfer(
            [
                'module_send_id' => $request->input('module_send_id'),
                'module_receive_id' => $request->input('module_receive_id'),
                'user_id' => auth()->user()->id,
                'description' => $request->input('description')
            ]
        );
        $transfer->save();
        array_map(
            fn ($value) => $transfer->medicaments()->attach($value['id'], ['quantity' => $value['quantity']]),
            $request->input('medicaments', [])
        );
        return Redirect(route('transfer.create',$request->input('module_send_id')));
    }
}
