<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicamentRequest;
use App\Models\Medicament;
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

    public function index(MedicamentRequest $request)
    {
         $paginate = max(min($request->get('page_size'), 100), 10);
        $search = $request->get('search',"");
        $orderBy = $request->get('orderBy', [['id' => "updated_at", 'desc' => false]]);
        $filters = $request->get('filters', []);

        //start building of query
        $query = Medicament::with('unit:id,name')
        ->where('id', 'LIKE', "{$search}%")
        ->orWhere('name', 'LIKE', "{$search}%")
        ->orWhere('code', 'LIKE', "{$search}%")
        ->orWhere('price_sale', 'LIKE', "{$search}%")
        ->orWhere('name', 'LIKE', "{$search}%");

        //fliters iteration
        array_map(function ($filter) use ($query) {
            $id = $filter['id'];
            $value = $filter['value'];

           /*  if (str_contains($id, "pivot.")) {
                if (is_array($value)) return $query->wherePivot(str_replace("pivot.", "", $id), ">=",   $value[0] ? $value[0] : 0)->wherePivot(str_replace("pivot.", "", $id), "<=",   $value[1] ? $value[1] : 9999999999.2);
                return $query->wherePivot(str_replace("pivot.", "", $id), "LIKE", "%" . $value . "%");
            } */
            if (str_contains($id, "unit.")) return $query->unit(str_replace('unit.', '', $id), $value);
            return $query->LikeOrBeetween('medicaments.' . $id, $value);
        }, $filters);
        //fliters orders
        array_map(function ($by) use ($query) {
            $id = $by['id'];
            $sorting = $by['desc'] == true ? "DESC" : 'ASC';

           /*  if (str_contains($id, "pivot.")) return $query->orderByPivot(str_replace("pivot.", "", $id), $sorting);
 */
            if (str_contains($id, "unit.")) return $query->orderByUnit(str_replace('unit.', '', $id), $sorting);
            if($id === 'quantity_global')return $query->orderByGlobalInventory($sorting);
            return $query->orderBy('medicaments.' . $id, $sorting);
        }, $orderBy);


        return Inertia::render('Medicaments/index.employee', ['data' => $query->paginate($paginate)]);
    }

    public function update(Request $request, $id)
    {/*
        $valido = $request->validate([
            'id' => ['required', 'integer', 'exists:medicaments'],
            'name' => ['alpha', 'max:80', Rule::unique('medicaments')->ignore($request->name)],
            'description' => ['max:250']
        ]);
        $item = Medicament::find($request->id);
        $item->update($valido);
        return $item->save() ? back() : back(500)->withErrors('save', 'error al guardar'); */
    }

    public function store(MedicamentRequest $request)
    {
        $validData = $request->validated();
        $item = new Medicament($validData);
        $item->save();
        return $item->save() ? Redirect::back() : back(500)->withErrors('save', 'error al guardar');
    }

    public function destroy($id)
    {
        $item = Medicament::find($id);

        if (!$item) {
            return back()->withErrors(['noDelete' => 'Esta Unidad No existe']);
        }
        return $item->delete() ? back() : back(500)->withErrors('save', 'error al eliminar');
    }
}
