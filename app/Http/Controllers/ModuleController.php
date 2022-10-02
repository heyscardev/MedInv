<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Models\Medicament;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:module.admin.index')->only(['indexAdmin']);
        $this->middleware('can:module.index')->only(['index']);
        $this->middleware('can:module.store')->only(['store']);
        $this->middleware('can:module.show')->only(['show']);
        $this->middleware('can:module.destroy')->only(['destroy']);
        $this->middleware('can:module.update')->only(['update']);
    }

    public function index()
    {
        $items = auth()->user()->modules;
        return Inertia::render('Modules/index.employee', ['data' => $items]);
    }

    public function indexAdmin()
    {
        $items = Module::get();
        return Inertia::render('Modules/index', ['data' => $items]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ModuleRequest $request, Module $module)
    {
        $search = $request->get('search');
        $paginate = max(min($request->get('page_size'), 100), 10);
        $orderBy = $request->get('orderBy', [['id' => "pivot.updated_at", 'desc' => false]]);
        $filters = $request->get('filters', []);

        //start building of query
        $query = $module->medicaments();

        //fliters iteration
        array_map(function ($filter) use ($query) {
            $id = $filter['id'];
            $value = $filter['value'];

            if (str_contains($id, "pivot.")) {
                if (is_array($value)) return $query->wherePivot(str_replace("pivot.", "", $id), ">=",   $value[0] ? $value[0] : 0)->wherePivot(str_replace("pivot.", "", $id), "<=",   $value[1] ? $value[1] : 9999999999.2);
                return $query->wherePivot(str_replace("pivot.", "", $id), "LIKE", "%" . $value . "%");
            }
            if (str_contains($id, "unit.")) return $query->unit(str_replace('unit.', '', $id), $value);
            return $query->LikeOrBeetween('medicaments.' . $id, $value);
        }, $filters);
        //fliters orders
        array_map(function ($by) use ($query) {
            $id = $by['id'];
            $sorting = $by['desc'] == true ? "DESC" : 'ASC';

            if (str_contains($id, "pivot.")) return $query->orderByPivot(str_replace("pivot.", "", $id), $sorting);

            if (str_contains($id, "unit.")) return $query->orderByUnit(str_replace('unit.', '', $id), $sorting);
            if($id === 'quantity_global')return $query->orderByGlobalInventory($sorting);
            return $query->orderBy('medicaments.' . $id, $sorting);
        }, $orderBy);
        return Inertia::render('Modules/show.employee', ['module' => $module, 'data' => $query->paginate($paginate)]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
