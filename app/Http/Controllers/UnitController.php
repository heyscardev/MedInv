<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:unit.index')->only(['index']);
        $this->middleware('can:unit.store')->only(['store']);
        $this->middleware('can:unit.destroy')->only(['destroy']);
        $this->middleware('can:unit.update')->only(['update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*   $data = User::with('modules')->find(auth()->user()->id);
        dd($data);
        $items = Unit::get();
        return Inertia::render('Units/index', ['data' => $items]); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $validData = $request->validate([
            'name'=>[ 'required','alpha', 'max:80','unique:units'],
            'description' => ['max:250']
        ]);
        $item = new Unit($validData);
        return $item->save() ? back() : back(500)->withErrors('save', 'error al guardar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $validData = $request->validate([
            'name'=>[ 'alpha', 'max:80',Rule::unique('units')->ignore($unit->id),],
            'description' => ['max:250']
        ]);
        $unit->update($validData);
        return $unit->save() ? back() : back(500)->withErrors('save', 'error al guardar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Unit::find($id);

        if (!$item) {
            return back()->withErrors(['noDelete' => 'Esta Unidad No existe']);
        }
        return $item->delete() ? back() : back(500)->withErrors('save', 'error al eliminar');
    }

}
