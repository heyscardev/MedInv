<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:inventory.index')->only(['index']);
        $this->middleware('can:inventory.store')->only(['store']);
        $this->middleware('can:inventory.destroy')->only(['destroy']);
        $this->middleware('can:inventory.update')->only(['update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Module::with('Medicaments')->all();
        return Inertia::render('Units/index', ['data' => $items]);
    }
}
