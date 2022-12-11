<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:patient.index')->only(['index']);
        $this->middleware('can:patient.store')->only(['store']);
        $this->middleware('can:patient.destroy')->only(['destroy']);
        $this->middleware('can:patient.update')->only(['update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = $request->get('page_size');

        $query = $request->has('deleted')
            ? Patient::onlyTrashed()->orderBy('deleted_at', 'desc')
            : Patient::withoutTrashed();
        $query = $this->applyFilters($query, $request);

        return Inertia::render('Patients/index', ['data' => $query->paginate($paginate)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $validated = $request->validated();
        $patient = new Patient($validated);
        $patient->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $validated = $request->validated();
        $patient->update($validated);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        // with soft deletes
        $patient->delete();
        return back();
    }

    public function restore($id)
    {
        Patient::withTrashed()->find($id)->restore();
        return back()->with('success', 'El paciente fue restaurado');
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
            if (is_array($filter['value'])) {

                return $query->when(array_key_exists(0, $filter['value']), function ($q) use ($filter) {
                    return $q->where('patients.' . $filter['id'], ">=", $filter['value'][0]);
                })->when(array_key_exists(1, $filter['value']), function ($q) use ($filter) {
                    return $q->where('patients.' . $filter['id'], "<=", $filter['value'][1]);
                });
            }
            
            return $query->where('patients.' . $filter['id'], "LIKE", "%" . $filter['value'] . "%");
        }, $filters);

        //fliters orders
        array_map(function ($by) use ($query) {
            $id = $by['id'];
            $sorting = $by['desc'] ? "DESC" : 'ASC';
            return $query->orderBy('patients.' . $id, $sorting);
        }, $orderBy);

        return $query;
    }
}
