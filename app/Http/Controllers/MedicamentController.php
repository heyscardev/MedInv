<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;
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

    public function index()
    {
        $items = Medicament::get();
        return Inertia::render('Medicaments/index', ['data' => $items]);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
