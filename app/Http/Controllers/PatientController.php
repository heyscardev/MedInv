<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
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
        $items = Patient::get();
        return Inertia::render('Patients/index', ['data' => $items]);
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
        // with soft deletes ??????????????
        $patient->delete();
        return back();
    }

    // public function restore($id)
    // {
    //     Doctor::withTrashed()->find($id)->restore();
    //     return back()->with('success', 'El doctor fue restaurado');
    // }
}
