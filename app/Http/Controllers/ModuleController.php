<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use Illuminate\Http\Request;
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('administrador')) {
            return  Inertia::render('Modules/index.admin', ['data' => Module::with('user')->get()]);
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
        // $search = $request->get('search');
        $paginate = max( min( $request->get('page_size'), 100), 10);

        $orderBy = $request->get('orderBy', [['id' => "pivot.updated_at", 'desc' => true]]);
        $filters = $request->get('filters', []);


        //start building of query
        $query = $module->medicaments();

        //fliters iteration
        array_map(function ($filter) use ($query) {
            $id = $filter['id'];
            $value = $filter['value'];  // [10,100] or  [10,null] or [null,10]


            if (str_contains($id, "pivot.")) {
                $column = str_replace("pivot.", "", $id);
                if (is_array($value))
                    return $query->wherePivot( $column, ">=",   $value[0] ? $value[0] : 0)
                                 ->wherePivot( $column, "<=",   $value[1] ? $value[1] : 9999999999.2);

                return $query->wherePivot( $column, "LIKE", "%" . $value . "%");
            }
            if (str_contains($id, "unit.")){
                $column = str_replace('unit.', '', $id);
                return $query->whereRelation('unit', $column, "LIKE", "%" . strtoupper($value) . "%");
            }

            return $query->LikeOrBeetween('medicaments.' . $id, $value);
        }, $filters);

        //fliters orders
        array_map(function ($by) use ($query) {
            $id = $by['id'];
            $sorting = $by['desc'] == true ? "DESC" : 'ASC';

            if (str_contains($id, "pivot."))
                return $query->orderByPivot(str_replace("pivot.", "", $id), $sorting);
            if (str_contains($id, "unit."))
                return $query->orderByUnit(str_replace('unit.', '', $id), $sorting);
            if ($id === 'quantity_global')
                return $query->orderByGlobalInventory($sorting);

            return $query->orderBy('medicaments.' . $id, $sorting);
        }, $orderBy);

        return Inertia::render('Modules/show.employee', ['module' => $module, 'data' => $query->paginate($paginate)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        // $item = Module::find($id);
        // if (!$item) {
        //     return back()->withErrors(['noDelete' => 'Esta Modulo No existe']);
        // }
        // return $item->delete() ? back() : back(500)->withErrors('save', 'error al eliminar');


        return $module->delete()
                ? back()
                : back(500)->withErrors('save', 'error al eliminar');
    }
}
