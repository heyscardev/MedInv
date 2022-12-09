<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:service.index')->only(['index']);
        $this->middleware('can:service.store')->only(['store']);
        $this->middleware('can:service.destroy')->only(['destroy']);
        $this->middleware('can:service.update')->only(['update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Service::orderby('id', 'desc')->get();
        return Inertia::render('Services/index', ['data' => $items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate(["name" => ["required", "string", "max:100"]]);
        $service = new Service(
            $valid
        );
        $service->save();
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $valid = $request->validate(["name" => ["sometimes", "required", "string", "max:100"]]);
        $service->update($valid);
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
