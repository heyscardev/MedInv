<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:module.index')->only(['index']);
        $this->middleware('can:module.store')->only(['store']);
        $this->middleware('can:module.show')->only(['show']);
        $this->middleware('can:module.destroy')->only(['destroy']);
        $this->middleware('can:module.update')->only(['update']);
        $this->middleware('can:module.restore')->only(['restore']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->hasRole('administrador')) {
            $modules = $request->has('deleted')
                ? Module::onlyTrashed()->orderBy('deleted_at', 'desc')->with('user')->get()
                : Module::withoutTrashed()->orderBy('updated_at', 'desc')->with('user')->get();
            return  Inertia::render('Modules/index.admin', ['data' => $modules, "users" => User::get()]);
        }
        return Inertia::render('Modules/index.employee', ['data' => auth()->user()->modules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleRequest $request)
    {
        $validated = $request->validated();
        $item = new Module($validated);
        $item->save();
        return $item->save() ? back() : back(500)->withErrors('save', 'error al guardar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ModuleRequest $request, Module $module)
    {
        //start building of query
        $query = $module->medicaments();
        $query = $this->applyFilters($query, $request);
        $data  = $query->paginate($request->get('page_size'));

        return Inertia::render('Modules/show.employee', ['module' => $module, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleRequest $request, Module $module)
    {
        $validated = $request->validated();
        $module->update($validated);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        return $module->delete()
            ? back()
            : back(500)->withErrors('save', 'error al eliminar');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        // Restore soft deletes
        $restore = Module::withTrashed()->find($id)->restore();
        return $restore
            ? back()
            : back(500)->withErrors('save', 'error al recuperar');
    }


    /**
     * Apply filters and order list
     **/
    private function applyFilters($query, $request)
    {
        $orderBy = $request->get('orderBy', [['id' => "pivot.updated_at", 'desc' => true]]);
        $filters = $request->get('filters', []);

        //fliters iteration
        array_map(function ($filter) use ($query) {
            $id = $filter['id'];
            $value = $filter['value'];  // [10,100] or  [10,null] or [null,10]

            if (str_contains($id, "pivot.")) {
                $column = str_replace("pivot.", "", $id);
                if (is_array($value))
                    return $query->wherePivot($column, ">=",   $value[0] ? $value[0] : 0)
                        ->wherePivot($column, "<=",   $value[1] ? $value[1] : 9999999999.2);

                return $query->wherePivot($column, "LIKE", "%" . $value . "%");
            }
            if (str_contains($id, "unit.")) {
                $column = str_replace('unit.', '', $id);
                return $query->whereRelation('unit', $column, "LIKE", "%" . strtoupper($value) . "%");
            }

            return $query->LikeOrBeetween('medicaments.' . $id, $value);
        }, $filters);

        //fliters orders
        array_map(function ($by) use ($query) {
            $id = $by['id'];
            $sorting = $by['desc'] ? "DESC" : 'ASC';

            if (str_contains($id, "pivot."))
                return $query->orderByPivot(str_replace("pivot.", "", $id), $sorting);
            if (str_contains($id, "unit."))
                return $query->orderByUnit(str_replace('unit.', '', $id), $sorting);
            if ($id === 'quantity_global')
                return $query->orderByGlobalInventory($sorting);

            return $query->orderBy('medicaments.' . $id, $sorting);
        }, $orderBy);

        return $query;
    }
    /**
     * end function apply filters and order list
     **/
}
