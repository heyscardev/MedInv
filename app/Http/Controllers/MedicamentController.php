<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicamentRequest;
use App\Models\Medicament;
use App\Models\MedicamentGroup;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class MedicamentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:medicament.index')->only(['index']);
        $this->middleware('can:medicament.store')->only(['store']);
        $this->middleware('can:medicament.destroy')->only(['destroy']);
        $this->middleware('can:medicament.update')->only(['update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MedicamentRequest $request)
    {

        // $paginate = max( min( $request->get('page_size'), 100), 10);

        //start building of query
        $query = Medicament::with(['group:id,name','unit:id,name']);

        $query = $this->applyFilters($query, $request);

        return Inertia::render('Medicaments/index.employee', ['data' => $query->get(), 'units' => Unit::get(), 'groups' => MedicamentGroup::get() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicamentRequest $request)
    {
        $validData = $request->validated();
        $item = new Medicament($validData);
        $item->save();
        return $item->save() ? Redirect::back() : back(500)->withErrors('save', 'error al guardar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicamentRequest $request, Medicament $medicament)
    {
        $validated = $request->validated();
        $medicament->update($validated);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicament $medicament)
    {
        // with soft deletes
        $medicament->delete();

        return back();
    }


    /////////////////////////////////////////
    /**
     * Apply filters and order list
     **/
    private function applyFilters($query, $request)
    {
        $orderBy = $request->get('orderBy', [['id' => "updated_at", 'desc' => true]]);
        $filters = $request->get('filters', []);

        //fliters iteration
            array_map(function ($filter) use ($query) {
                $id = $filter['id'];
                $value = $filter['value'];

                // if (str_contains($id, "pivot.")) {
                //     if (is_array($value)) return $query->wherePivot(str_replace("pivot.", "", $id), ">=",   $value[0] ? $value[0] : 0)->wherePivot(str_replace("pivot.", "", $id), "<=",   $value[1] ? $value[1] : 9999999999.2);
                //     return $query->wherePivot(str_replace("pivot.", "", $id), "LIKE", "%" . $value . "%");
                // }
                if (str_contains($id, "unit.")) return $query->unit(str_replace('unit.', '', $id), $value);
                return $query->LikeOrBeetween('medicaments.' . $id, $value);
            }, $filters);
        //fliters orders
            array_map(function ($by) use ($query) {
                $id = $by['id'];
                $sorting = $by['desc'] ? "DESC" : 'ASC';

                // if (str_contains($id, "pivot.")) return $query->orderByPivot(str_replace("pivot.", "", $id), $sorting);
                if (str_contains($id, "unit.")) return $query->orderByUnit(str_replace('unit.', '', $id), $sorting);
                if($id === 'quantity_global')return $query->orderByGlobalInventory($sorting);
                return $query->orderBy('medicaments.' . $id, $sorting);
            }, $orderBy);

        return $query;
    }
    /**
     * end function apply filters and order list
     **/
}
