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
