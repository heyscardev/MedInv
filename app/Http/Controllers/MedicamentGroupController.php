<?php

namespace App\Http\Controllers;

use App\Models\MedicamentGroup;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class MedicamentGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:medicament.group.index')->only(['index']);
        $this->middleware('can:medicament.group.store')->only(['store']);
        $this->middleware('can:medicament.group.destroy')->only(['destroy']);
        $this->middleware('can:medicament.group.update')->only(['update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = MedicamentGroup::orderby('id')->get();
        return Inertia::render('MedicamentGroups/index', ['data' => $data]);
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
            'name'=>[ 'required', 'max:80','unique:medicament_groups'],
            'description'=>['max:255']
        ]);
        $item = new MedicamentGroup($validData);
        return $item->save() ? back() : back(500)->withErrors('save', 'error al guardar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicamentGroup $medicament_group)
    {
        $validData = $request->validate([
            'name'=>['max:80', Rule::unique('units')->ignore($medicament_group->id) ],
            'description'=>['max:255']
        ]);
        $medicament_group->update($validData);
        return $medicament_group->save() ? back() : back(500)->withErrors('save', 'error al guardar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = MedicamentGroup::find($id);

        if (!$item) {
            return back()->withErrors(['noDelete' => 'Esta Grupo de Medicamento No existe']);
        }
        return $item->delete() ? back() : back(500)->withErrors('save', 'error al eliminar');
    }
}
