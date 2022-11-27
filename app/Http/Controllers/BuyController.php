<?php

namespace App\Http\Controllers;

use App\Http\Requests\Buy\CreateBuyRequest;
use App\Models\Buy;
use App\Models\Medicament;
use App\Models\Module;
use App\Models\Unit;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $valid = $request->validate([
            'filters'=>'array|min:1',
            'filter.medicament'=>'numeric|min:1',
            'filter.module'=>'numeric|min:1',
            'filter.unit'=>'numeric|min:1'
        ]);
        $data = Buy::where('user_id',auth()->user()->id)->paginate(10);
        return inertia('Buys/index.employee',['data'=>$data]);

        if(isset($valid['filters'])){

        };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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


    /////////////////////////////////////////
    /**
     * Apply filters and order list
     **/
    private function applyFilters($query, $request)
    {
        //
    }
    /**
     * end function apply filters and order list
     **/

}
