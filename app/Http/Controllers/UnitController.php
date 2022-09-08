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

    public function index()
    {
        $data = User::with('modules')->find(auth()->user()->id);
        dd($data);
        $items = Unit::get();
        return Inertia::render('Units/index', ['data' => $items]);
    }

    public function update(Request $request, $id)
    {
        $valido = $request->validate([
            'id' => ['required', 'integer', 'exists:units'],
            'name' => [ 'alpha', 'max:80', Rule::unique('units')->ignore($request->name)],
            'description' => ['max:250']
        ]);
        $item = Unit::find($request->id);
        $item->update($valido);
        return $item->save() ? back() : back(500)->withErrors('save', 'error al guardar');
    }
    public function destroy($id)
    {
        $item = Unit::find($id);

        if (!$item) {
            return back()->withErrors(['noDelete' => 'Esta Unidad No existe']);
        }
        return $item->delete() ? back() : back(500)->withErrors('save', 'error al eliminar');
    }
    public function store(Request $request )
    {
        $validData = $request->validate([
            'name'=>[ 'required','alpha', 'max:80','uniques'],
            'description' => ['max:250']
        ]);
        $item = new Unit($validData);
        return $item->save() ? back() : back(500)->withErrors('save', 'error al guardar');
    }

}
