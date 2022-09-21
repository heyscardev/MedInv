<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\Module;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:module.admin.index')->only(['indexAdmin']);
        $this->middleware('can:module.index')->only(['index']);
        $this->middleware('can:module.store')->only(['store']);
        $this->middleware('can:module.show')->only(['show']);
        $this->middleware('can:module.destroy')->only(['destroy']);
        $this->middleware('can:module.update')->only(['update']);
    }

    public function index()
    {
        $items = auth()->user()->modules;
        return Inertia::render('Modules/index.employee', ['data' => $items]);
    }

    public function indexAdmin()
    {
        $items = Module::get();
        return Inertia::render('Modules/index', ['data' => $items]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $item = Module::find($id);
        if (!isset($item)) return abort('404');
        if ($item->user->id !== auth()->user()->id) return abort('403');
        return Inertia::render('Modules/show.employee', ['module' => $item, 'medicaments' => Medicament::all(), 'data' => $item->medicaments]);
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
