<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:module.index')->only(['index']);
        $this->middleware('can:module.store')->only(['store']);
        $this->middleware('can:module.destroy')->only(['destroy']);
        $this->middleware('can:module.update')->only(['update']);
    }

    public function index()
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
