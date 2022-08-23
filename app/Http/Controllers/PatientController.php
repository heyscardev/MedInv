<?php

namespace App\Http\Controllers;

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

    public function index()
    {
        $items = Patient::get();
        return Inertia::render('Patients/index', ['data' => $items]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
