<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

    public function update(Request $request, $id)
    {
        $valido = $request->validate([
            'id' => ['required', 'integer', 'exists:medicaments'],
            'name' => ['alpha', 'max:80', Rule::unique('medicaments')->ignore($request->name)],
            'description' => ['max:250']
        ]);
        $item = Medicament::find($request->id);
        $item->update($valido);
        return $item->save() ? back() : back(500)->withErrors('save', 'error al guardar');
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'code' => ['required', 'max:25','unique'],
            'name' => ['required', 'max:100', 'unique'],
            'unit_id' => ['required','numeric','exists:units'],
            'price_sale' =>['numeric','max:99999999999.99'],
            'quantity_exist'=> ['numeric'],
        ]);
        $item = new Medicament($validData);
        return $item->save() ? back() : back(500)->withErrors('save', 'error al guardar');
    }

    public function destroy($id)
    {
        $item = Medicament::find($id);

        if (!$item) {
            return back()->withErrors(['noDelete' => 'Esta Unidad No existe']);
        }
        return $item->delete() ? back() : back(500)->withErrors('save', 'error al eliminar');
    }
}
