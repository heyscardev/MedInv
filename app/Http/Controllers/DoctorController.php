<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:doctor.index')->only(['index']);
        $this->middleware('can:doctor.store')->only(['store']);
        $this->middleware('can:doctor.destroy')->only(['destroy']);
        $this->middleware('can:doctor.update')->only(['update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->has('deleted')
            ? Doctor::onlyTrashed()->orderBy('deleted_at', 'desc')->get()
            : Doctor::withoutTrashed()->get();
        $services = Service::get();
        return Inertia::render('Doctors/index', compact('data', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $validated = $request->validated();
        $doctor = new Doctor($validated);
        $doctor->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $validated = $request->validated();
        $doctor->update($validated);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        // with soft deletes
        $doctor->delete();
        return back();
    }

    public function restore($id)
    {
        Doctor::withTrashed()->find($id)->restore();
        return back()->with('success', 'El doctor fue restaurado');
    }
}
