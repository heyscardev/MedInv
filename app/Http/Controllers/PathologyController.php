<?php

namespace App\Http\Controllers;

use App\Models\Pathology;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PathologyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:pathology.index')->only(['index']);
        $this->middleware('can:pathology.store')->only(['store']);
        $this->middleware('can:pathology.destroy')->only(['destroy']);
        $this->middleware('can:pathology.update')->only(['update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pathology::orderby('id','desc')->get();
        return Inertia::render('Pathologies/index', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            "name" => ["required", "unique:pathologies","string", "max:25"],
            "code" => ["required", "unique:pathologies","string", "max:25"],
        ]);
        $pathology = new Pathology(
            $valid
        );
        $pathology->save();
        return back();
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
        $valid = $request->validate([
            "name" => ["required", "unique:pathologies","string", "max:25"],
            "code" => ["required", "unique:pathologies","string", "max:25"],
        ]); $service = new Pathology(
            $valid
        );
        $service->save();
        return back();
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
