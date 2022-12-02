<?php

namespace App\Http\Controllers;

use App\Http\Requests\Buy\CreateBuyRequest;
use App\Http\Requests\ModuleBuyRequest;
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
    public function __construct()
    {
        $this->middleware('can:buy.index')->only(['index']);
        $this->middleware('can:buy.store')->only(['store']);
        $this->middleware('can:buy.destroy')->only(['destroy']);
        $this->middleware('can:buy.update')->only(['update']);
        $this->middleware('can:buy.restore')->only(['restore']);
    }
    public function index(Request $request, Module $module)
    {

        $paginate = max(min($request->get('page_size'), 100), 10);
        $query = Buy::with('module', 'medicaments', 'user');

        if ($module->exists) {
            if (!auth()->user()->hasRole('administrador') && $module->user_id !== auth()->user()->id) return back(403);
            
            $query = $query->where('module_id', $module->id);
           
        } else {
            if (auth()->user()->hasRole('administrador')) {
                $query = $query->where('user_id', auth()->user()->id);
            } else {
                $query =  $query->where('user_id', auth()->user()->id)
                    ->orWhereHas('module', function ($query) {
                        $query->where('user_id', '=', auth()->user()->id);
                    });
            }
        }

       
        $data = $query->orderBy('updated_at', "desc")->paginate($paginate);
        return inertia('Buys/index.employee', compact('data', 'module'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ModuleBuyRequest $request, Module $module)
    {
        $modulesQuery = Module::with('user');
        $modules = auth()->user()->hasRole('administrador') ? $modulesQuery->get() : $modulesQuery->where('user_id', auth()->user()->id);
        $search = $request->get('search', null);
        $Medicaments = $search ? Medicament::whereRelation('unit', 'name', 'LIKE', "%$search%")->orWhere('name', 'LIKE', '%' . $search . '%')->orWhere('code', 'LIKE', '%' . $search . '%')->orderBy('name')->with('unit')->distinct('medicaments.id')->get() : [];
        $units = Unit::orderBy('name')->get();
        return inertia('Buys/create', ['module' => $module->exists ? $module : null, 'medicaments' => $Medicaments, 'units' => $units, 'modules' => $modules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBuyRequest $request)
    {

        $data = $request->validated();
        $module = Module::find($data['module_id']);
        if (!auth()->user()->hasRole('administrador') && $module->user_id !== auth()->user()->id) return back(403);

        $buy = new Buy(['module_id' => $module->id, 'user_id' => auth()->user()->id, 'description' => isset($data['description']) ? $data['description'] : null]);
        $buy->save();
        array_map(function ($value) use ($buy) {
            $buy->medicaments()->attach($value['id'], ['quantity' => $value['quantity'], 'price' => $value['price']]);
        }, $data['medicaments']);
        return redirect(route('buy.index', $module->id));
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
